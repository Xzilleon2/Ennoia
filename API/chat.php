<?php
session_start();

header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: POST, OPTIONS');
header('Access-Control-Allow-Headers: Content-Type');

if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
    http_response_code(200);
    exit;
}

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    echo json_encode(['error' => 'POST only']);
    exit;
}

require_once __DIR__ . '/model.php';
require_once __DIR__ . '/../Classes/MessagesCntrl.class.php';
require_once __DIR__ . '/../Classes/MessagesView.class.php';
require_once __DIR__ . '/../Classes/EmotionsCntrl.class.php';

$input = json_decode(file_get_contents("php://input"), true);

if (!$input || !isset($input['text'])) {
    http_response_code(400);
    echo json_encode(['error' => 'Missing text field']);
    exit;
}

$message = trim($input['text']);
$stream  = $input['stream'] ?? false;
$userid  = $_SESSION['user_id'] ?? null;

try {

    // =========================
    // BUILD PROMPT (STRING ONLY)
    // =========================
    $prompt = "";

    // SYSTEM PROMPT
    $prompt .= "You are Ennoia, an emotionally intelligent counselling assistant.\n";
    $prompt .= "You provide emotional support, reflection, and follow-up questions.\n\n";

    // HISTORY
    if ($userid) {
        $record = new MessagesView();
        $history = $record->ChatHistoryPrompt($userid);

        if (!empty($history)) {
            foreach ($history as $entry) {

                if (!empty($entry['USER_MESSAGE'])) {
                    $prompt .= "User: " . $entry['USER_MESSAGE'] . "\n";
                }

                if (!empty($entry['BOT_MESSAGE'])) {
                    $prompt .= "Assistant: " . $entry['BOT_MESSAGE'] . "\n";
                }
            }
        }
    }

    // CURRENT MESSAGE
    $prompt .= "\nUser: " . $message . "\nAssistant:";

    // =========================
    // STREAM MODE
    // =========================
    if ($stream) {

        header('Content-Type: text/event-stream');
        header('Cache-Control: no-cache');
        header('Connection: keep-alive');

        stream_bot_response($prompt);
        exit;
    }

    // =========================
    // NORMAL RESPONSE
    // =========================
    $response = get_bot_response($prompt);

    if (!$response) {
        throw new Exception("Empty model response");
    }

    // SAVE CHAT
    if ($userid) {
        $recorder = new MessagesCntrl($userid, $response, $message);
        $messageid = $recorder->RecordMessages();
    }

    // SAVE EMOTION ANALYSIS
    $analysisprompt = "
        Return ONLY valid JSON. No explanation. No text.

        {
        \"emotion\": \"happy\",
        \"confidence\": 0.85,
        \"sentiment\": \"positive\"
        }

        Message:
        $message
    ";

    // Bot Emotion Analysis Response
    $emotion_analysis = get_bot_response($analysisprompt);
    $analysis = json_decode($emotion_analysis, true);
    
    if (json_last_error() !== JSON_ERROR_NONE) {
        error_log("JSON ERROR: " . json_last_error_msg());
        error_log("RAW: " . $emotion_analysis);

        $analysis = [
            "emotion" => "unknown",
            "confidence" => 0,
            "sentiment" => "neutral"
        ];
    }

    if (!$analysis) {
    $analysis = [
        "emotion" => "unknown",
        "confidence" => 0,
        "sentiment" => "neutral"
    ];
}

    // SAVE EMOTION ANALYSIS TO DATABASE
    if ($userid && $messageid) {

        $emotionsCntrl = new EmotionsCntrl($messageid, $userid, $analysis['emotion'], $analysis['confidence'], $analysis['sentiment']);
        $emotionsCntrl->RecordEmotion();
    }

    // Return JSON response with bot's reply
    echo json_encode([
        "success" => true,
        "response" => $response
    ]);

} catch (Exception $e) {

    http_response_code(500);
    echo json_encode([
        "success" => false,
        "error" => $e->getMessage()
    ]);
}
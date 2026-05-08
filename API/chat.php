<?php
session_start();
header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST, OPTIONS');
header('Access-Control-Allow-Headers: Content-Type');

// Handle CORS preflight
if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
    http_response_code(200);
    exit;
}

// Include the model functions
require_once __DIR__ . '/model.php';
require_once __DIR__ . '/../Classes/MessagesCntrl.class.php';
require_once __DIR__ . '/../Classes/MessagesView.class.php';

// Only accept POST requests
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    echo json_encode(['error' => 'Method not allowed. Use POST.']);
    exit;
}

// Get JSON input
$input = json_decode(file_get_contents('php://input'), true);

if (!$input || !isset($input['text'])) {
    http_response_code(400);
    echo json_encode(['error' => 'Missing required field: text']);
    exit;
}

$message = $input['text'];
$stream = $input['stream'] ?? false;

// Get the user ID from session
$userid = $_SESSION['user_id'] ?? null;

try {
    if ($stream) {
        // Stream response token by token
        header('Content-Type: text/event-stream');
        header('Cache-Control: no-cache');
        header('Connection: keep-alive');
        
        stream_bot_response($message);
    } else {

        $raw_message = $message;

        // Get Chat History
        if ($userid) {
            $record = new MessagesView();
            $history = $record->ChatHistoryPrompt($userid);

            if ($history) {
                $combined_history = "";
                foreach ($history as $entry) {
                    $combined_history .= "User: " . $entry['USER_MESSAGE'] . "\n";
                    $combined_history .= "Bot: " . $entry['BOT_MESSAGE'] . "\n";
                }
                $message = $combined_history . "User: " . $message;
            }
        }

        // Get the bot's response
        $response = get_bot_response($message);

        // Record only the raw user message, not the full history blob
        if ($userid) {
            $recorder = new MessagesCntrl($userid, $response, $raw_message);
            $recorder->RecordMessages();
        }

        echo json_encode([
            'response' => $response,
            'success'  => true
        ]);
    }
} catch (Exception $e) {
    http_response_code(500);
    echo json_encode([
        'error' => $e->getMessage(),
        'success' => false
    ]);
}
?>

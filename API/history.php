<?php
session_start();
header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST, OPTIONS');
header('Access-Control-Allow-Headers: Content-Type');

if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
    http_response_code(200);
    exit;
}

require_once __DIR__ . '/../Classes/MessagesView.class.php';

$userid = $_SESSION['user_id'] ?? null;
session_write_close();

if (!$userid) {
    http_response_code(401);
    echo json_encode(['error' => 'Not logged in']);
    exit;
}

$recorder = new MessagesView();
$action = $_GET['action'] ?? '';

if ($action === 'dates') {

    $dates = $recorder->ChatHistory($userid);

    echo json_encode([
        'dates' => $dates ?: []
    ]);

} elseif ($action === 'recent') {

    $messages = $recorder->ChatHistory($userid);

    $filtered = array_filter($messages, function($m) {

        $userMessage = trim($m['USER_MESSAGE'] ?? '');
        $botMessage  = trim($m['BOT_MESSAGE'] ?? '');

        // Ignore intro prompt
        if ($userMessage === 'Ask a short warm emotional opening question.') {
            return false;
        }

        // Ignore Ollama connection errors
        if (strpos($botMessage, 'Unable to connect to Ollama model') !== false) {
            return false;
        }

        return true;
    });

    echo json_encode([
        'messages' => array_values($filtered)
    ]);

} elseif ($action === 'messages') {

    $date = $_GET['date'] ?? null;

    if (!$date) {
        http_response_code(400);

        echo json_encode([
            'error' => 'Missing date'
        ]);

        exit;
    }

    $messages = $recorder->MessagesByDate($userid, $date);

    $filtered = array_filter($messages, function($m) {

        $userMessage = trim($m['USER_MESSAGE'] ?? '');
        $botMessage  = trim($m['BOT_MESSAGE'] ?? '');

        // Ignore intro prompt
        if ($userMessage === 'Ask a short warm emotional opening question.') {
            return false;
        }

        // Ignore Ollama connection errors
        if (strpos($botMessage, 'Unable to connect to Ollama model') !== false) {
            return false;
        }

        return true;
    });

    echo json_encode([
        'messages' => array_values($filtered)
    ]);

} else {

    http_response_code(400);

    echo json_encode([
        'error' => 'Invalid action'
    ]);
}
?>
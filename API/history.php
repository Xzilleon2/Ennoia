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
    echo json_encode(['dates' => $dates ?: []]);

} elseif ($action === 'recent') {
    $messages = $recorder->ChatHistory($userid);

    // Remove the intro prompt from display
    $filtered = array_filter($messages, function($m) {
        return trim($m['USER_MESSAGE']) !== 'Ask a short warm emotional opening question.';
    });

    echo json_encode(['messages' => array_values($filtered) ?: []]);
} else {
    http_response_code(400);
    echo json_encode(['error' => 'Invalid action']);
}
?>
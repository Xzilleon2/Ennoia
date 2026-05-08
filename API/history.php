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

require_once __DIR__ . '/../Classes/MessagesCntrl.class.php';

$userid = $_SESSION['user_id'] ?? null;

if (!$userid) {
    http_response_code(401);
    echo json_encode(['error' => 'Not logged in']);
    exit;
}

$recorder = new MessagesCntrl();
$action = $_GET['action'] ?? '';

if ($action === 'dates') {
    // Return all distinct chat dates
    $dates = $recorder->GetChatDates($userid);
    echo json_encode(['dates' => $dates ?: []]);

} elseif ($action === 'messages') {
    // Return messages for a specific date
    $date = $_GET['date'] ?? date('Y-m-d'); // default to today
    $messages = $recorder->GetMessagesByDate($userid, $date);
    echo json_encode(['messages' => $messages ?: [], 'date' => $date]);

} else {
    http_response_code(400);
    echo json_encode(['error' => 'Invalid action']);
}
?>
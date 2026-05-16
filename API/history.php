<?php
session_start();
date_default_timezone_set('Asia/Manila');

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

/* =========================
   FILTER FUNCTION (REUSED)
========================= */
function filterMessages($messages) {
    return array_values(array_filter($messages, function ($m) {

        $userMessage = trim($m['USER_MESSAGE'] ?? '');
        $botMessage  = trim($m['BOT_MESSAGE'] ?? '');

        // Ignore intro prompt
        if ($userMessage === 'Ask a short warm emotional opening question.') {
            return false;
        }

        // Ignore Ollama errors
        if (strpos($botMessage, 'Unable to connect to Ollama model') !== false) {
            return false;
        }

        return true;
    }));
}

/* =========================
   ROUTES
========================= */
switch ($action) {

    /* -------------------------
       GET DISTINCT CHAT DATES
    ------------------------- */
    case 'dates':

        $dates = $recorder->Dates($userid);

        echo json_encode([
            'dates' => $dates ?: []
        ]);
        exit;

    /* -------------------------
       GET TODAY / RECENT CHAT
    ------------------------- */
    case 'recent':

        $messages = $recorder->ChatHistory($userid);

        echo json_encode([
            'messages' => filterMessages($messages)
        ]);
        exit;

    /* -------------------------
       GET MESSAGES BY DATE
    ------------------------- */
    case 'messages':

        $date = $_GET['date'] ?? null;

        if (!$date) {
            http_response_code(400);
            echo json_encode(['error' => 'Missing date']);
            exit;
        }

        $messages = $recorder->MessagesByDate($userid, $date);

        echo json_encode([
            'messages' => filterMessages($messages)
        ]);
        exit;

    /* -------------------------
       INVALID ACTION
    ------------------------- */
    default:

        http_response_code(400);
        echo json_encode([
            'error' => 'Invalid action'
        ]);
        exit;
}
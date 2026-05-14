<?php
if (defined('MESSAGES_VIEW_LOADED')) {
    die('CIRCULAR INCLUDE: MessagesView.class.php loaded twice');
}
define('MESSAGES_VIEW_LOADED', true);
include_once __DIR__ . "/Messages.class.php";

class MessagesView extends Messages {

    /* =========================
    PROMPT HISTORY (SAFE SMALL SET)
    ========================= */
    public function ChatHistoryPrompt($userid) {
        $messages = $this->getMessagesForPrompt($userid);

        return $messages ?: [];
    }


    /* =========================
    CHAT HISTORY 
    ========================= */
    public function ChatHistory($userid) {
        $messages = $this->getMessages($userid);

        return $messages ?: [];
    }

    /* =========================
    CHAT HISTORY BY DATE
    ========================= */
    public function MessagesByDate($userid, $date) {
        return $this->getMessages($userid, $date) ?: [];
    }

    /* =========================
    MESSAGES DATE
    ========================= */
    public function Dates($userid) {
        $messages_dates = $this->getMessagesDates($userid);

        return $messages_dates ?: [];
    }
}
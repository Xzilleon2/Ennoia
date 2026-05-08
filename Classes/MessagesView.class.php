<?php
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
    CHAT HISTORY (LIMITED SAFE OUTPUT)
    ========================= */
    public function ChatHistory($userid) {
        $messages = $this->getMessages($userid);

        return $messages ?: [];
    }


    /* =========================
    CHAT DATES (SIDEBAR SAFE)
    ========================= */
    public function GetChatDates($userid) {
        $dates = $this->getChatDates($userid);

        return $dates ?: [];
    }


    /* =========================
    MESSAGES BY DATE (SAFE)
    ========================= */
    public function GetMessagesByDate($userid, $date) {
        $messages = $this->getMessagesByDate($userid, $date);

        return $messages ?: [];
    }
}
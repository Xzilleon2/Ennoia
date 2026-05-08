<?php
include_once __DIR__ . "/Dbh.class.php";

class Messages extends Dbh {

    /* =========================
    GET LAST 10 MESSAGES (PROMPT)
    ========================= */
    protected function getMessagesForPrompt($userid) {
        try {
            $query = "
                SELECT USER_MESSAGE, BOT_MESSAGE, created_at
                FROM messages
                WHERE USER_ID = ?
                AND created_at >= CURDATE()
                AND created_at < (CURDATE() + INTERVAL 1 DAY)
                ORDER BY created_at ASC
                LIMIT 10
            ";

            $stmt = $this->connection()->prepare($query);
            $stmt->execute([$userid]);

            $messages = [];

            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                $messages[] = $row;
            }

            return $messages;

        } catch (PDOException $e) {
            error_log($e->getMessage());
            return false;
        }
    }


    /* =========================
    GET TODAY MESSAGES (CHAT VIEW)
    ========================= */
    protected function getMessages($userid) {
        try {
            $query = "
                SELECT USER_MESSAGE, BOT_MESSAGE, created_at
                FROM messages
                WHERE USER_ID = ?
                AND created_at >= CURDATE()
                AND created_at < (CURDATE() + INTERVAL 1 DAY)
                ORDER BY created_at ASC
            ";

            $stmt = $this->connection()->prepare($query);
            $stmt->execute([$userid]);

            $messages = [];

            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                $messages[] = $row;
            }

            return $messages;

        } catch (PDOException $e) {
            error_log($e->getMessage());
            return false;
        }
    }


    /* =========================
    INSERT MESSAGE
    ========================= */
    protected function insertMessage($userid, $botmessage, $usermessage) {
        try {
            $query = "
                INSERT INTO messages (USER_ID, BOT_MESSAGE, USER_MESSAGE)
                VALUES (?, ?, ?)
            ";

            $stmt = $this->connection()->prepare($query);
            $stmt->execute([$userid, $botmessage, $usermessage]);

            return true;

        } catch (PDOException $e) {
            error_log($e->getMessage());
            return false;
        }
    }
}
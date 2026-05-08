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
                LIMIT 200
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
    GET CHAT DATES (SIDEBAR)
    ========================= */
    protected function getChatDates($userid) {
        try {
            $query = "
                SELECT DATE(created_at) as chat_date
                FROM messages
                WHERE USER_ID = ?
                GROUP BY DATE(created_at)
                ORDER BY chat_date DESC
                LIMIT 30
            ";

            $stmt = $this->connection()->prepare($query);
            $stmt->execute([$userid]);

            $dates = [];

            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                $dates[] = $row;
            }

            return $dates;

        } catch (PDOException $e) {
            error_log($e->getMessage());
            return false;
        }
    }


    /* =========================
    GET MESSAGES BY DATE
    ========================= */
    protected function getMessagesByDate($userid, $date) {
        try {
            $query = "
                SELECT USER_MESSAGE, BOT_MESSAGE, created_at
                FROM messages
                WHERE USER_ID = ?
                AND created_at >= ?
                AND created_at < DATE_ADD(?, INTERVAL 1 DAY)
                ORDER BY created_at ASC
                LIMIT 50
            ";

            $stmt = $this->connection()->prepare($query);
            $stmt->execute([$userid, $date, $date]);

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
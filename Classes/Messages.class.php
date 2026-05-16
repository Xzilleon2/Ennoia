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
    GET MESSAGE BASE ON DATES
    ========================= */
    protected function getMessages($userid, $date = null) {
        try {

            // fallback to today if no date passed
            $date = $date ?? date('Y-m-d');

            $start = $date . " 00:00:00";
            $end   = date('Y-m-d', strtotime($date . ' +1 day')) . " 00:00:00";

            $query = "
                SELECT USER_MESSAGE, BOT_MESSAGE, created_at
                FROM messages
                WHERE USER_ID = ?
                AND created_at >= ?
                AND created_at < ?
                ORDER BY created_at ASC
            ";

            $stmt = $this->connection()->prepare($query);
            $stmt->execute([$userid, $start, $end]);

            return $stmt->fetchAll(PDO::FETCH_ASSOC);

        } catch (PDOException $e) {
            error_log($e->getMessage());
            return false;
        }
    }

    /* =========================
    GET MESSAGE DATES
    ========================= */
    protected function getMessagesDates($userid) {
        try {
            $query = "
                SELECT DISTINCT DATE(created_at) AS message_date
                FROM messages
                WHERE USER_ID = ?
                ORDER BY message_date DESC
            ";

            $stmt = $this->connection()->prepare($query);
            $stmt->execute([$userid]);

            return $stmt->fetchAll(PDO::FETCH_ASSOC);

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

            $conn = $this->connection();
            $stmt = $conn->prepare($query);
            $stmt->execute([$userid, $botmessage, $usermessage]);

            return $conn->lastInsertId();

        } catch (PDOException $e) {
            error_log($e->getMessage());
            return false;
        }
    }
}
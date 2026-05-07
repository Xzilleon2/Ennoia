<?php
include_once __DIR__ . "/Dbh.class.php";

class Messages extends Dbh {

    // Search messages by user ID
    protected function getMessages($userid) {
        try {
            $query = "SELECT * FROM messages WHERE USER_ID = ?";
            $stmt = $this->connection()->prepare($query);
            $stmt->execute([$userid]);

            $user = $stmt->fetch(PDO::FETCH_ASSOC);

            return $user;

        } catch (PDOException $e) {

            $message = "Database error occurred.";
            error_log($e->getMessage());

            return false;
        }
    }

    // Insert new message
    protected function insertMessage($userid, $botmessage, $usermessage) {

        try {
            $query = "INSERT INTO messages (USER_ID, BOT_MESSAGE, USER_MESSAGE) VALUES (?, ?, ?)";
            $stmt = $this->connection()->prepare($query);
            $stmt->execute([$userid, $botmessage, $usermessage]);

            return true;

        } catch (PDOException $e) {

            $message = "Database error occurred.";
            error_log($e->getMessage());

            return false;
        }
    }
    
}
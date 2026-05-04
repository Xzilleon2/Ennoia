<?php
include_once __DIR__ . "/Dbh.class.php";

class Users extends Dbh {

    // Search user by username
    protected function getUsers($username, &$message) {
        try {
            $query = "SELECT * FROM users WHERE USERNAME = ?";
            $stmt = $this->connection()->prepare($query);
            $stmt->execute([$username]);

            $user = $stmt->fetch(PDO::FETCH_ASSOC);

            return $user;

        } catch (PDOException $e) {

            $message = "Database error occurred.";
            error_log($e->getMessage());

            return false;
        }
    }

    // Insert new user
    protected function insertUsers($username, $passwordHash, &$message) {
        try {
            $query = "INSERT INTO users (USERNAME, PASSWORD) VALUES (?, ?)";
            $stmt = $this->connection()->prepare($query);
            $stmt->execute([$username, $passwordHash]);

            return true;

        } catch (PDOException $e) {

            $errorCode = $e->getCode();
            $sqlMessage = $e->getMessage();

            // Default message
            $message = "Database error occurred.";

            // Handle known SQLSTATE codes
            switch ($errorCode) {

                case '23000':
                    $message = "Duplicate entry detected (data already exists).";
                    break;

                case '1049':
                    $message = "Database not found.";
                    break;

                case '1045':
                    $message = "Invalid database credentials.";
                    break;

                case '42S02':
                    $message = "Table does not exist.";
                    break;

                default:
                    $message = "Unexpected error: " . $sqlMessage;
                    break;
            }

            error_log($sqlMessage);

            return false;
        }
    }
    
}
<?php
session_start();
include_once __DIR__ . "/Users.class.php";

class UsersCntrl extends Users {

    // Attributes
    private $username;
    private $password;
    private $passwordRep;

    // Constructor
    public function __construct($username = "", $password = "", $passwordRep = "") {
        $this->username = $username;
        $this->password = $password;
        $this->passwordRep = $passwordRep;
    }

    // Login
    public function Login($username, $password, &$message) {

        if (!$this->checkEmpty(['username'=> $username, 'password' => $password], $message)) {
            return false;
        }

        $user = $this->getUsers($username, $message);

        if (!$user) {
            $message = "User does not exist.";
            return false;
        }

        if (!password_verify($password, $user['PASSWORD'])) {
            $message = "Incorrect password.";
            return false;
        }

        // Set session variables
        $_SESSION['user_id'] = $user['USER_ID'];
        $_SESSION['username'] = $user['USERNAME'];

        return true;
    }

    // Register Method
    public function Register(&$message) {

        if (!$this->checkEmpty(['username' => $this->username, 'password' => $this->password, 'passwordRep' => $this->passwordRep], $message)) {
            return false;
        }

        if ($this->password !== $this->passwordRep) {
            $message = "Passwords do not match.";
            return false;
        }

        $hash = password_hash($this->password, PASSWORD_DEFAULT);

        if (!$this->insertUsers($this->username, $hash, $message)) {
            return false; // return DB error message
        }

        return true;
    }

    // Private Methods
    private function checkEmpty(array $fields, &$message) {
        foreach ($fields as $name => $value) {
            if ($value === null || trim($value) === '') {
                $message = ucfirst($name) . " is required.";
                return false;
            }
        }
        return true;
    }

}
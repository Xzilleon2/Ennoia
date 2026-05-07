<?php
session_start();
include_once __DIR__ . "/Messages.class.php";

class MessagesCntrl extends Messages {

    // Attributes
    private $userid;
    private $botmessage;
    private $usermessage;

    // Constructor
    public function __construct($userid = "", $botmessage = "", $usermessage = "") {
        $this->userid = $userid;
        $this->botmessage = $botmessage;
        $this->usermessage = $usermessage;
    }

    // Register Method
    public function RecordMessages() {

        if (!$this->checkEmpty(['userid' => $this->userid, 'botmessage' => $this->botmessage, 'usermessage' => $this->usermessage])) {
            return false;
        }

        if (!$this->insertMessage($this->userid, $this->botmessage, $this->usermessage)) {
            return false;
        }

        return true;
    }

    // Private Methods
    private function checkEmpty(array $fields) {
        foreach ($fields as $name => $value) {
            if ($value === null || trim($value) === '') {
                return false;
            }
        }
        return true;
    }

}
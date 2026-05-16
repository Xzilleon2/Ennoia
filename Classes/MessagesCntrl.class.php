<?php
if (defined('MESSAGES_CNTRL_LOADED')) {
    die('CIRCULAR INCLUDE: MessagesCntrl.class.php loaded twice');
}
define('MESSAGES_CNTRL_LOADED', true);
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

        if (!$this->checkEmpty([
            'userid' => $this->userid,
            'botmessage' => $this->botmessage,
            'usermessage' => $this->usermessage
        ])) {
            return false;
        }

        $lastId = $this->insertMessage(
            $this->userid,
            $this->botmessage,
            $this->usermessage
        );

        if (!$lastId) {
            return false;
        }

        return $lastId;
    }

    /** Private Methods **/ 
    private function checkEmpty(array $fields) {
        foreach ($fields as $name => $value) {
            if ($value === null || trim($value) === '') {
                return false;
            }
        }
        return true;
    }

}
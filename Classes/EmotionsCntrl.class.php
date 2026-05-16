<?php
include_once __DIR__ . "/Emotions.class.php";

class EmotionsCntrl extends Emotions {

    // Attributes
    private $messageid;
    private $userid;
    private $emotion;
    private $confidence;
    private $sentiment;

    // Constructor
    public function __construct($messageid = "", $userid = "", $emotion = "", $confidence = "", $sentiment = "") {
        $this->messageid = $messageid;
        $this->userid = $userid;
        $this->emotion = $emotion;
        $this->confidence = $confidence;
        $this->sentiment = $sentiment;
    }

    // Record Emotion Method
    public function RecordEmotion() {

        if (!$this->checkEmpty(['userid' => $this->userid, 'emotion' => $this->emotion, 'confidence' => $this->confidence, 'sentiment' => $this->sentiment])) {
            return false;
        }

        if (!$this->insertEmotionAnalysis($this->messageid, $this->userid, $this->emotion, $this->confidence, $this->sentiment)) {
            return false;
        }

        return true;
    }

    /** Private Methods **/ 
    private function checkEmpty(array $fields) {

        foreach ($fields as $name => $value) {

            if ($value === null) {
                return false;
            }

            if (is_string($value) && trim($value) === '') {
                return false;
            }
        }

        return true;
    }

}
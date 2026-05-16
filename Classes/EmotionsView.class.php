<?php
include_once __DIR__ . "/Emotions.class.php";

class EmotionsView extends Emotions {

    /* =========================
    GET TOP 5 EMOTIONS THIS WEEK
    ========================= */
    public function TopEmotionHistory($userid) {
        $emotions = $this->getTopEmotionAnalysis($userid);

        return $emotions ?: [];
    }

    /* =========================
    GET TOP EMOTION THIS WEEK
    ========================= */
    public function TopEmotionThisWeek($userid) {
        $emotions = $this->getTopEmotion($userid);

        return $emotions ?: [];
    }
}
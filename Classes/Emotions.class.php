<?php
include_once __DIR__ . "/Dbh.class.php";

class Emotions extends Dbh {

    /* =========================
    GET TOP 5 EMOTIONS THIS WEEK
    ========================= */
    protected function getTopEmotionAnalysis($userid) {

        try {

            $query = "
                SELECT 
                    predicted_emotion,
                    COUNT(*) AS total_count,
                    ROUND(COUNT(*) / SUM(COUNT(*)) OVER () * 100, 2) + 0 AS emotion_percentage
                FROM emotion_analysis
                WHERE user_id = ? && predicted_emotion != 'unknown'
                AND created_at >= DATE_SUB(CURDATE(), INTERVAL 7 DAY)
                GROUP BY predicted_emotion
                ORDER BY total_count DESC
                LIMIT 5;
            ";

            $stmt = $this->connection()->prepare($query);
            $stmt->execute([$userid]);

            $emotions = [];

            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                $emotions[] = $row;
            }

            return $emotions;

        } catch (PDOException $e) {

            error_log($e->getMessage());
            return false;
        }
    }

    /* =========================
    GET TOP EMOTION THIS WEEK
    ========================= */
    protected function getTopEmotion($userid) {

        try {

            $query = "
                SELECT 
                    predicted_emotion,
                    COUNT(*) AS total_count,
                    ROUND(COUNT(*) / SUM(COUNT(*)) OVER () * 100, 2) + 0 AS emotion_percentage
                FROM emotion_analysis
                WHERE user_id = ? && predicted_emotion != 'unknown'
                AND created_at >= DATE_SUB(CURDATE(), INTERVAL 7 DAY)
                GROUP BY predicted_emotion
                ORDER BY total_count DESC
                LIMIT 1;
            ";

            $stmt = $this->connection()->prepare($query);
            $stmt->execute([$userid]);

            $emotions = [];

            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                $emotions[] = $row;
            }

            return $emotions;

        } catch (PDOException $e) {

            error_log($e->getMessage());
            return false;
        }
    }

    /* =========================
    INSERT EMOTION ANALYSIS
    ========================= */
    protected function insertEmotionAnalysis($messageid, $userid, $emotion, $confidence, $sentiment) {
        try {
            $query = "
                INSERT INTO emotion_analysis (MESSAGE_ID, USER_ID, PREDICTED_EMOTION, CONFIDENCE_SCORE, SENTIMENT)
                VALUES (?, ?, ?, ?, ?)
            ";

            $stmt = $this->connection()->prepare($query);
            if(!$stmt->execute([$messageid, $userid, $emotion, $confidence, $sentiment])) {
                return false;
            }

            return true;

        } catch (PDOException $e) {
            error_log($e->getMessage());
            return false;
        }
    }
}
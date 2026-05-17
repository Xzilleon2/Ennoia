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
    GET SENTIMENT ANALYSIS THIS WEEK
    ========================= */
    protected function getSentimentAnalysis($userid) {

        try {

            $query = "
                SELECT 
                    wd.day_name AS day,

                    COALESCE(SUM(CASE WHEN ea.SENTIMENT = 'positive' THEN 1 ELSE 0 END), 0) AS positive_count,
                    COALESCE(SUM(CASE WHEN ea.SENTIMENT = 'negative' THEN 1 ELSE 0 END), 0) AS negative_count,
                    COALESCE(SUM(CASE WHEN ea.SENTIMENT = 'neutral' THEN 1 ELSE 0 END), 0) AS neutral_count

                FROM (
                    SELECT CURDATE() - INTERVAL (WEEKDAY(CURDATE()) + 1) DAY AS day_date, 'Sunday' AS day_name
                    UNION ALL SELECT CURDATE() - INTERVAL (WEEKDAY(CURDATE()) + 0) DAY, 'Monday'
                    UNION ALL SELECT CURDATE() - INTERVAL (WEEKDAY(CURDATE()) - 1) DAY, 'Tuesday'
                    UNION ALL SELECT CURDATE() - INTERVAL (WEEKDAY(CURDATE()) - 2) DAY, 'Wednesday'
                    UNION ALL SELECT CURDATE() - INTERVAL (WEEKDAY(CURDATE()) - 3) DAY, 'Thursday'
                    UNION ALL SELECT CURDATE() - INTERVAL (WEEKDAY(CURDATE()) - 4) DAY, 'Friday'
                    UNION ALL SELECT CURDATE() - INTERVAL (WEEKDAY(CURDATE()) - 5) DAY, 'Saturday'
                ) wd

                LEFT JOIN emotion_analysis ea
                    ON DATE(ea.CREATED_AT) = wd.day_date
                    AND ea.USER_ID = ?

                GROUP BY wd.day_date, wd.day_name
                ORDER BY wd.day_date;
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
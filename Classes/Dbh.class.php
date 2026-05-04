<?php

class Dbh {

    // Attributes
    private $host = 'localhost';
    private $user = 'root';
    private $pwd = '';
    private $dbName = 'ennoiadb';
    private $conn;

    // Connection method
    protected function connection() {

        if(!$this->conn){
            try {
                $dsn = 'mysql:host=' . $this->host . ';dbname=' . $this->dbName;
                $this->conn = new PDO($dsn, $this->user, $this->pwd);
                $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $this->conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
                return $this->conn;
            } catch (PDOException $e) {
                echo "Error:" . $e->getMessage() . "<br>";
                exit;
            }
        }

        return $this->conn;
    }

}
?>
<?php
class Database {
    private $host = "localhost";
    private $db_name = "expense_db";
    private $username = "root";
    private $password = "";
    public $conn = null;

    public function getConnection() {
        $this->conn = null;
        try {
            $this->conn = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->db_name . ";charset=utf8mb4", $this->username, $this->password);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch(PDOException $exception) {
            echo "There is something wrong : " . $exception->getMessage();
        }
        return $this->conn;
    }
}

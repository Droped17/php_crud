<?php
namespace App\Config;
use PDO;

class Database {
    private $host = "localhost";
    private $db_name = "mvc_crud";
    private $username = "root";
    private $password = "";
    public $conn;

    public function getConnection(): PDO {
        $this->conn = null;
        try {
            $this->conn = new PDO(
                "mysql:host=" .$this->host . ";dbname=" . $this->db_name,
                $this->username,
                $this->password
            );
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (\PDOException $e) {
            die("DB Connection Error: " . $e -> getMessage());
        }
        return $this->conn;
    }
}


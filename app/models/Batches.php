<?php

namespace App\Models;

use PDO;

class Batches {
    private $conn;
    private $table = "batches";

    public function __construct($db) 
    {
        $this->conn = $db;
    }

    public function all() {
        $stmt = $this->conn->query("SELECT * FROM {$this->table} ORDER BY id DESC");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function create($ref_no, $title, $description) {
        $stmt = $this->conn->prepare("INSERT INTO {$this->table} (ref_no, title, description) VALUES (?, ?, ?)");
        return $stmt->execute([$ref_no, $title, $description]);
    }

}
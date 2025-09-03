<?php

namespace App\Models;

use PDO;

class Categories
{
    private $conn;
    private $table = "categories";

    public function __construct($db)
    {
        $this->conn = $db;
    }

    /* MARK: ALL */
    public function all()
    {
        $stmt = $this->conn->query("SELECT * FROM {$this->table} ORDER BY id DESC");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function create($name, $description)
    {
        $stmt = $this->conn->prepare("INSERT INTO {$this->table} (name, description) VALUES (?, ?)");
        return $stmt->execute([$name, $description]);
    }
}

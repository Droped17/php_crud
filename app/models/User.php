<?php
namespace App\Models;

use PDO;

class User {
    private $conn;
    private $table = "users";

    public function __construct($db) {
        $this->conn = $db;
    }

    /* MARK: ALL */
    public function all() {
        $stmt = $this->conn->query("SELECT * FROM {$this->table} ORDER BY id DESC");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    /* MARK: FIND */
    public function find($id) {
        $stmt = $this->conn->prepare("SELECT * FROM {$this->table} WHERE id=?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    /* MARK: CREATE */
    public function create($name, $email) {
        $stmt = $this->conn->prepare("INSERT INTO {$this->table} (name, email) VALUES (?, ?)");
        return $stmt->execute([$name, $email]);
    }

    /* MARK UPDATE */
    public function update($id, $name, $email) {
        $stmt = $this->conn->prepare("UPDATE {$this->table} SET name=?, email=? WHERE id=?");
        return $stmt->execute([$name, $email, $id]);
    }

    /* MARK: DELETE */
    public function delete($id) {
        $stmt = $this->conn->prepare("DELETE FROM {$this->table} WHERE id=?");
        return $stmt->execute([$id]);
    }

    
}
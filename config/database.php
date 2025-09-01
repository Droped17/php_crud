<?php
$host = "localhost";
$db_name = "php_crud";
$user = "root";
$pass = "";
$connect = "";

try {
    // can use this but better with PDO
    // $connect = mysqli_connect($host, $user, $pass, $db_name);
    $pdo = new PDO("mysql:host=$host;dbname=$db_name;charset=utf8mb4", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // error mode
} catch (PDOException $e) {
    die("DB Connection failed: " . $e->getMessage());
}

// if ($pdo) echo "Yout are connected database!";
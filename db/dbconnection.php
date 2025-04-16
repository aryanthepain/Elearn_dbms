<?php
$dsn = "mysql:host=localhost;dbname=lab8_elearn;charset=utf8mb4";
$dbUser = "root";
$dbPass = "";

try {
    $pdo = new PDO($dsn, $dbUser, $dbPass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Database Connection Failed: " . $e->getMessage());
}

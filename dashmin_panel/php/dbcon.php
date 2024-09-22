<?php
session_start();

$server = "mysql:host=localhost;dbname=decor_vista";
$user = "root";
$pass = "";

try {
    $pdo = new PDO($server, $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
    exit;
}



?>
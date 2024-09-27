<?php
<<<<<<< HEAD
=======


>>>>>>> c60664e13d82be9a2800fc7ee778c484e8856af9
$server = "mysql:host=localhost;dbname=decore_vista";
$user = "root";
$pass = "";

try {
    $pdo = new PDO($server, $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
    exit;
}

session_start();

?>
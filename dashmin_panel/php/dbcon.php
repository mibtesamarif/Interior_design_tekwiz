<?php
<<<<<<< HEAD
$server = "mysql:host=localhost;dbname=decorvista";
$user = "root";
$pass = "";

try {
    $pdo = new PDO($server, $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
    exit;
}
=======
$server="mysql:host=localhost;dbname=interiordesign";
$user="root";
$password="";
$pdo=new PDO($server,$user,$password);
>>>>>>> b00339fa210c7d088eb9d2a3b0d1abd0486787c5
?>
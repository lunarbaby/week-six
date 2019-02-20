<?php

$servername = "localhost";
$username = "root";
$password = "";

try {
    $pdo = new PDO("mysql:host=$servername",$username,$password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "CREATE DATABASE myEmployees";
    $pdo->exec($sql);
    echo "Database created successfully";
} catch(PDOException $e){
    echo $sql."<br>".$e->getMessage();
}
$pdo = null;
?>
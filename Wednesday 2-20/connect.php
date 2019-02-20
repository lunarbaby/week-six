<?php
$servername = "localhost";
$username = "root";
$password = "";


try {
    //Connect to server
    $pdo = new PDO("mysql:host=$servername",$username,$password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Connected successfully";
} catch(PDOException $e){
    echo "Connection failed: ".$e->getMessage();
}
$pdo = null;
?>
<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "employees";

try {
    $pdo = new PDO("mysql:host=$servername;dbname=$dbname",$username,$password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $stmt = $pdo->prepare("SELECT * FROM myEmployees");
    $stmt->execute();

    //set the resulting array to see data in database
    $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $result = $stmt->fetchAll();
    echo "<pre>";
    var_dump($result);
    echo "</pre>";
     
} catch(PDOException $e){
    echo "Error: " . $e->getMessage();
}
$pdo = null;
?>
<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "employees";

try {
    $pdo = new PDO("mysql:host=$servername;dbname=$dbname",$username,$password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "INSERT INTO myEmployees (firstname, lastname, email)
    VALUES ('Adam', 'Park', 'adam@example.com')";
    $pdo->exec($sql);
    echo "New record created successfully";
} catch(PDOException $e){
    echo $sql."<br>".$e->getMessage();
}
$pdo = null;
?>
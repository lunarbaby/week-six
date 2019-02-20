<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "employees";

try {
    $pdo = new PDO("mysql:host=$servername;dbname=$dbname",$username,$password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    //Create Table
    $sql = "CREATE TABLE myEmployees (
        id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
        firstname VARCHAR(30) NOT NULL,
        lastname VARCHAR(30) NOT NULL,
        email VARCHAR(50),
        reg_date TIMESTAMP
        )";
    $pdo->exec($sql);
    echo "Table myEmployees created successfully";
} catch(PDOException $e){
    echo $sql."<br>".$e->getMessage();
}
$pdo = null;
?>
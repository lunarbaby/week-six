<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "employees";

try {
    $pdo = new PDO("mysql:host=$servername;dbname=$dbname",$username,$password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // update record
    $sql = "UPDATE myEmployees SET lastname='Davis' WHERE id = 5";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();

    echo $stmt->rowCount()." records UPDATED successfully";

     
} catch(PDOException $e){
    echo "Error: " . $e->getMessage();
}
$pdo = null;
?>
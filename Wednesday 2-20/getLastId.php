<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "employees";

try {
    $pdo = new PDO("mysql:host=$servername;dbname=$dbname",$username,$password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "INSERT INTO myEmployees (firstname, lastname, email)
    VALUES ('Jane', 'Doe', 'jan@example.com')";
    $pdo->exec($sql);
    $last_id = $pdo->lastInsertId();
    echo "New record created successfully. Last inserted ID is: ".$last_id;
} catch(PDOException $e){
    echo $sql."<br>".$e->getMessage();
}
$pdo = null;
?>
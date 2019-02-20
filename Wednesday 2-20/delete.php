<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "employees";

try {
    $pdo = new PDO("mysql:host=$servername;dbname=$dbname",$username,$password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // delete a recorde using id
    $sql = "DELETE FROM myEmployees WHERE id = 9";
    $pdo->exec($sql);
    echo "Record deleted successfully";

     
} catch(PDOException $e){
    echo "Error: " . $e->getMessage();
}
$pdo = null;
?>
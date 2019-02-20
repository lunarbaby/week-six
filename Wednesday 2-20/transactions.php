<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "employees";

try {
    $pdo = new PDO("mysql:host=$servername;dbname=$dbname",$username,$password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    //begin the transaction
    $pdo->beginTransaction();


    // our SQL statements
    $pdo->exec("INSERT INTO myEmployees (firstname, lastname, email) 
    VALUES ('Ashely', 'Hige', 'ashely@example.com')");
    $pdo->exec("INSERT INTO myEmployees (firstname, lastname, email) 
    VALUES ('Mary', 'Moe', 'mary@example.com')");
    $pdo->exec("INSERT INTO myEmployees (firstname, lastname, email) 
    VALUES ('Julie', 'Dooley', 'julie@example.com')");
    
    
    // commit the transaction
    $pdo->commit();
    echo "New records created successfully";
     
} catch(PDOException $e){
    // roll back the transaction if something failed
    $pdo->rollback();
    echo "Error: " . $e->getMessage();
}
$pdo = null;
?>
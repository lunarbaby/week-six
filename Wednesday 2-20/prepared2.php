<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "employees";

try {
    $pdo = new PDO("mysql:host=$servername;dbname=$dbname",$username,$password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    // prepare sql and bind parameters
    $stmt = $pdo->prepare("INSERT INTO myEmployees (firstname, lastname, email) 
    VALUES (:firstname, :lastname, :email)");
    $stmt->execute(['firstname'=>$firstname, 'lastname'=>$lastname, 'email'=>$email]);

    // insert a row
    $firstname = "Jackie";
    $lastname = "Chan";
    $email = "john@example.com";
    $stmt->execute();

    // insert another row
    $firstname = "Daisy";
    $lastname = "Moe";
    $email = "daisy@example.com";
    $stmt->execute();

    // insert another row
    $firstname = "July";
    $lastname = "Sunny";
    $email = "july@example.com";
    $stmt->execute();

    echo "New records created successfully";
     
} catch(PDOException $e){
    echo "Error: " . $e->getMessage();
}
$pdo = null;
?>
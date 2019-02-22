<html>
<head>
<title>Todo list</title>
</head>
<body>
    <h1>Todo list</h1>
    <form action="index.php" method="post">
    <p>Task: </p>
    <input type="text" name="task">
    <input type="submit" name="submit" value="Add">
    </form>
</body>
</html>
<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname ="todolist";
$pdo = new PDO("mysql:host=$servername;dbname=$dbname",$username,$password);
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
if(isset($_POST['submit'])){
    $task = $_POST['task'];
    //Create Record
    $sql = "INSERT INTO todoapp (task) VALUES ('$task')";
    $pdo->exec($sql);
    $last_id = $pdo->lastInsertId();
    var_dump($_POST);
    echo "New record is created and the last inserted ID is: ".$last_id."<br>";
    
    
    $stmt = $pdo->prepare("SELECT * FROM todoapp");
    $stmt->execute();
    $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $result = $stmt->fetchAll();
    
} 

echo "<table>";
$stmt = $pdo->prepare("SELECT * FROM todoapp");
$stmt->execute();
$stmt->setFetchMode(PDO::FETCH_ASSOC);
$result = $stmt->fetchAll();
foreach($result as $row){
 global $idbutton;
 $idbutton = $row['id'];
 echo "<tr><td>".$row['task']. "<form action='index.php' method='post'><input name='delete' value=$idbutton hidden ><input type='submit' value='delete'></input></form></td></tr>";
}
echo "</table>";

if(isset($_POST['delete'])) {
    $delete = $_POST['delete'];
 $sql = "DELETE FROM todoapp WHERE id=$delete";
 $pdo->exec($sql);
 }

?>




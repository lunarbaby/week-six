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
    $stmt =$pdo->prepare("INSERT INTO todoapp(task) VALUES (:task)");
    $stmt->bindParam(':task', $task);
    
}

$pdo = null;
?>


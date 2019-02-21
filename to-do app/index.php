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
    echo "New record created successfully";

    // $stmt =$pdo->prepare("INSERT INTO todoapp(task) VALUES (:task)");
    // $stmt->bindParam(':task', $task);
    // $stmt = $pdo->prepare("SELECT * FROM todoapp");
    // $stmt->execute();
    // $stmt->setFetchMode(PDO::FETCH_ASSOC);
    // $result = $stmt->fetchAll();
    // foreach($stmt as $result){
    //     echo "<pre>";
    //     var_dump($result);
    //     echo "</pre>";
    // }
}

$pdo = null;
?>


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

echo "<table style='border: solid 1px black;'>";
echo "<tr><th>Id</th><th>Task</th><th>Time entered</tr></tr>";

class TableRows extends RecursiveIteratorIterator { 
    function __construct($it) { 
        parent::__construct($it, self::LEAVES_ONLY); 
    }

    function current() {
        return "<td style='width:150px;border:1px solid black;'>" . parent::current(). "</td>";
    }

    function beginChildren() { 
        echo "<tr>"; 
    } 

    function endChildren() { 
        echo "</tr>" . "\n";
    } 
} 

//Connect to server
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

    //Show records

    $stmt = $pdo->prepare("SELECT * FROM todoapp");
    $stmt->execute();

    //set the resulting array to see data in database
    $result= $stmt->setFetchMode(PDO::FETCH_ASSOC);
    foreach(new TableRows(new RecursiveArrayIterator($stmt->fetchAll())) as $k=>$v){
       echo $v;
    }
        

   
}

$pdo = null;
?>

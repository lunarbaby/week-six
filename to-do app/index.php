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

// echo "<table>";
// echo "<tr><th>Id</th><th>Task</th><th>Time entered</tr></tr>";

// class TableRows extends RecursiveIteratorIterator { 
//     function __construct($it) { 
//         parent::__construct($it, self::LEAVES_ONLY); 
//     }

//     function current() {
//         return "<td style='width:150px;border:1px solid black;'>" . parent::current(). "</td>";
//     }

//     function beginChildren() { 
//         echo "<tr>"; 
//     } 

//     function endChildren() {
//         echo "</tr>" . "\n";
//     } 
// } 


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
    echo "New record is created and the last inserted ID is: ".$last_id."<br>";
    
    
    $stmt = $pdo->prepare("SELECT * FROM todoapp");
    $stmt->execute();
    $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $result = $stmt->fetchAll();
    // foreach(new TableRows(new RecursiveArrayIterator($stmt->fetchAll())) as $k=>$v){
    //    echo $v;
    //     }
    echo "<table>";
       foreach($result as $row){
        global $idbutton;
        $idbutton = $row['id'];
        echo "<tr>".$row['task']. "<form action='index.php' method='post'><input type='submit' value='delete' name='delete' id='$idbutton'></form></tr><br>";
    }
    echo "</table>";

    if(isset($_POST['delete'])) {
        $id = $_POST['delete'];
        $sql = "DELETE FROM todoapp WHERE id=$id";
        $pdo->exec($sql);
    }
    
   
} 
$pdo = null;
?>




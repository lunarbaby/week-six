<form action="form.php" method="post">
User name: <input type="text" name="user" require>
<input type="submit">
</form>

<?php

if ($_SERVER["REQUEST_METHOD"] == "POST"){
    if (!filter_var($_POST['user'], FILTER_VALIDATE_INT) === false){
        echo "Not a valid input";
    } else {
        $userName = $_POST['user'];
        $userName = filter_var($userName, FILTER_SANITIZE_STRING);
        include "welcome.php";
        include "header.php";
        // echo "$userName";
    }
} else {
    echo "Access Deined";
}

?>


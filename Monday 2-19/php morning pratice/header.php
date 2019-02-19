
<?php
$namecookie = "user";
$cookievalue = $_POST['user'];
setcookie($namecookie, $cookievalue, time() + (86400 * 3), "/");
// echo "Cookie named $namecookie and value is $_COOKIE[$namecookie]";

?>
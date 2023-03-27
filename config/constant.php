<?php
session_start();

define('SITEURL', 'http://localhost:8080/RaveHR/');
define('LOCALHOST', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_NAME', 'ravehr');

$conn = mysqli_connect('localhost', 'root', '')  or die(mysqli_error());
$db_select = mysqli_select_db($conn, 'ravehr') or die(mysqli_error());
?>
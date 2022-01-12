<?php
//use php 5.4 version else doesnot work
 define('DB_SERVER', 'localhost');
 define('DB_USERNAME', 'your db username');
 define('DB_PASSWORD', 'db password');
 define('DB_NAME', 'u793524113_project');
/* Attempt to connect to MySQL database */
$link = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
?>

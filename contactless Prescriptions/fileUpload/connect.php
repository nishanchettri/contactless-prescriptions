<?php
 define('DB_SERVER', 'localhost');
 define('DB_USERNAME', 'your db username');
 define('DB_PASSWORD', 'your db password');
 define('DB_NAME', 'your db name');
/* Attempt to connect to MySQL database */
$link = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
?>

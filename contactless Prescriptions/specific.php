
<?php
$servername = "localhost";

$dbname = "your db name";
// REPLACE with Database user
$username = "your db user name";
// REPLACE with Database user password
$password = "your db password";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_GET["pid"]))
{
    $pid = $_GET['pid'];
$sql = "SELECT med FROM testTable WHERE pid='$pid'";


if ($result = $conn->query($sql))
 {
    while ($row = $result->fetch_assoc()) {
        $med = $row["med"];
        echo $med;
    }

    $result->free();

}
}
$conn->close();
?>

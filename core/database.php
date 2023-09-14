<?php
$servername = 'localhost';
$username = 'root';
// $username = 'kurseictbz_30712';
$password = null;
// $password = 'db_307_pw_12';
$db = 'werkstatt';
// $db = 'kurseictbz_30712';
$conn = new mysqli($servername, $username, $password, $db);
mysqli_set_charset($conn, 'utf8');
if ($conn -> connect_errno) {
    echo "Failed to connect to MySQL: ".$mysqli->connect_error;
    exit();
}
?>
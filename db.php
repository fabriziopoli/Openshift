<?php

$conn = new mysqli(
    'localhost', 
    'root', 
    null, 
    'openshift_webshop'
);

mysqli_set_charset($conn, 'utf8');
if ($conn->connect_errno) {
    echo "Failed to connect to MySQL: ".$mysqli->connect_error;
    exit();
}
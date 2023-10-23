
<?php

$mysqlHost = 'mysql'; 
$mysqlUsername = 'openshift2';
$mysqlPassword = 'openshift'; // The password you set during user creation
$mysqlDatabase = 'openshift_webshop'; 

// Create a connection to MySQL
$conn = new mysqli($mysqlHost, $mysqlUsername, $mysqlPassword, $mysqlDatabase);

// Check the connection
if ($conn->connect_error) {
    echo "Failed to connect to MySQL: " . $conn->connect_error;
    exit();
}

mysqli_set_charset($conn, 'utf8');

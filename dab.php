<?php
// dab.php

$servername = "localhost"; // Database server name
$username = "root";        // Database username
$password = "";            // Database password
$database = "bene";     // Database name

// Create a connection to the MySQL database
$conn = new mysqli($servername, $username, $password, $database);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Optionally set the character set
$conn->set_charset("utf8");
?>
<?php
// Database credentials
define('DB_SERVER', 'localhost');  // MySQL server IP or hostname
define('DB_USERNAME', 'root'); // MySQL username
define('DB_PASSWORD', ''); // MySQL password
define('DB_NAME', 'bene'); // MySQL database name

// Attempt to connect to MySQL database
$mysqli = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

// Check connection
if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}
?>
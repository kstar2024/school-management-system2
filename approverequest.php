<?php
// Database connection parameters (same as before)
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "bene";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if ID and action parameters are set
if (isset($_GET['id']) && isset($_GET['action'])) {
    // Sanitize the input to prevent SQL injection
    $id = intval($_GET['id']);
    $action = $_GET['action']; // 'approve' or 'reject'

    // Determine status based on action
    $newStatus = ($action == 'approve') ? 'approved' : 'rejected';

    // SQL to update status
    $sql = "UPDATE reg SET status = '$newStatus' WHERE id = $id";

    if ($conn->query($sql) === TRUE) {
        echo "<script>alert ('Record with ID $id has been $action successfully')</scrit>";
        header("refresh:1; url=applicationspage.php");

    } else {
        echo "Error updating record: " . $conn->error;
    }
} else {
    echo "ID or action parameter is missing";
}

$conn->close();
?>
<?php
// Connect to your MySQL database (change these parameters as per your setup)
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

// Check if item ID is provided and is numeric
if(isset($_GET['id']) && is_numeric($_GET['id'])) {
    $item_id = $_GET['id'];

    // Update approval status
    $sql = "UPDATE ben SET status = 1 WHERE id = $item_id";
    $redirect_url = "approval.php";
    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('Approved Successfully.');";
        echo "window.location.href = '$redirect_url';</script>";
    } else {
        echo "Error updating record: " . $conn->error;
    }
} else {
    echo "Invalid item ID.";
}

$conn->close();
?>


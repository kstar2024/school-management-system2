<?php
// Start session
session_start();

// Check if student_id is set in session
if (!isset($_SESSION['student_id'])) {
    die("You must be logged in to send messages.");
}

// Database credentials
$servername = "localhost";
$username = "root"; // Replace with your MySQL username
$password = ""; // Replace with your MySQL password
$dbname = "bene"; // Replace with your database name

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Connect to the database
    $conn = new mysqli($servername, $username, $password, $dbname);
    
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Get the form data
    $recipient = $_POST['recipient'];
    $message_content = $_POST['message_content'];
    $sender = $_SESSION['student_id'];

    // Insert message data into the database
    $sql = "INSERT INTO messages (sender, recipient, message_content, sent_time) VALUES (?, ?, ?, NOW())";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("iis", $sender, $recipient, $message_content);

    if ($stmt->execute()) {
        echo "The message has been sent successfully.";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $stmt->close();
    $conn->close();
} else {
    echo "Invalid request.";
}
?>

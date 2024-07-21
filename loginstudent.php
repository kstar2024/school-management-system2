<?php
session_start();

// Establish database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "bene";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Retrieve form data
$studentid = $_POST['studentid'];
$password = $_POST['password'];

// Retrieve hashed password from database
$sql = "SELECT id, studentid, password FROM studentsignup WHERE studentid='$studentid'";
$result = $conn->query($sql);

if ($result->num_rows == 1) {
    // User found
    $row = $result->fetch_assoc();
    $hashed_password = $row['password'];

    // Verify password
    if (password_verify($password, $hashed_password)) {
        // Password is correct, set session variables
        $_SESSION['loggedin'] = true;
        $_SESSION['studentid'] = $studentid;
        $_SESSION['user_id'] = $row['id'];
        
        // Redirect to home page or wherever you want
        header('Location: studentdash.php');
        exit;
    } else {
        // Password is incorrect
        echo "<script>alert('Username or Password Incorrect');</script>";
        header("refresh:0; url=studentlogin.php");
    }
} else {
    // User not found
    echo "<script>alert('User not Found');</script>";
        header("refresh:0; url=studentsignup.php");
}

$conn->close();
?>
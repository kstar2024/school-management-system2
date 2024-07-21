<?php
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

// Retrieve form data and sanitize
$adminid = $_POST['adminid'];
$adminame = $_POST['adminame'];
$password = $_POST['password'];
$email = $_POST['email'];

// Hash password
$hashed_password = password_hash($password, PASSWORD_DEFAULT);

// Check if studentid already exists
$sql_check = "SELECT * FROM adminreg WHERE adminid = ?";
$stmt_check = $conn->prepare($sql_check);
$stmt_check->bind_param("s", $adminid);
$stmt_check->execute();
$result = $stmt_check->get_result();

if ($result->num_rows > 0) {
    // Student ID already exists
    echo "<script>alert('The User is Already Registered');</script>";
    header("refresh:1; url=adminuserreg.php");
    exit();

} else {
    // Prepare and bind SQL statement for insertion
    $sql_insert = "INSERT INTO adminreg (adminid, adminame, password, email) VALUES (?, ?, ?, ?)";
    $stmt_insert = $conn->prepare($sql_insert);
    $stmt_insert->bind_param("ssss", $adminid, $adminame, $hashed_password, $email);
    
    // Execute the prepared statement
    if ($stmt_insert->execute()) {
        echo "<script>alert('Registration Successful!');</script>";
        header("refresh:1; url=adminuserreg.php");
    } else {
        echo "Error: " . $stmt_insert->error;
    }
}

$stmt_check->close();
$stmt_insert->close();
$conn->close();
?>
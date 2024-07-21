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
$studentid = $_POST['studentid'];
$username = $_POST['username'];
$password = $_POST['password'];
$email = $_POST['email'];

// Hash password
$hashed_password = password_hash($password, PASSWORD_DEFAULT);

// Check if studentid already exists
$sql_check = "SELECT * FROM studentsignup WHERE studentid = ?";
$stmt_check = $conn->prepare($sql_check);
$stmt_check->bind_param("s", $studentid);
$stmt_check->execute();
$result = $stmt_check->get_result();

if ($result->num_rows > 0) {
    // Student ID already exists
    echo "<script>alert('Student ID is Already Registered');</script>";
    header("refresh:1; url=studentsignup.php");
    exit();

} else {
    // Prepare and bind SQL statement for insertion
    $sql_insert = "INSERT INTO studentsignup (studentid, username, password, email) VALUES (?, ?, ?, ?)";
    $stmt_insert = $conn->prepare($sql_insert);
    $stmt_insert->bind_param("ssss", $studentid, $username, $hashed_password, $email);
    
    // Execute the prepared statement
    if ($stmt_insert->execute()) {
        echo "<script>alert('Registration Successful!');</script>";
        .approve-link, .reject-link {
    display: inline-block;
    padding: 5px 10px;
    margin-right: 10px;
    text-decoration: none;
    color: #fff;
    background-color: #5cb85c; /* green */
    border: 1px solid #4cae4c; /* darker green */
    border-radius: 3px;
}

.reject-link {
    background-color: #d9534f; /* red */
    border: 1px solid #d43f3a; /* darker red */
}
    } else {
        echo "Error: " . $stmt_insert->error;
    }
}

$stmt_check->close();
$stmt_insert->close();
$conn->close();
?>
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
$studentid = filter_input(INPUT_POST, 'studentid', FILTER_SANITIZE_STRING);
$username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
$password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);
$email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);

// Validate form data
$errors = [];
if (empty($studentid) || empty($username) || empty($password) || empty($email)) {
    $errors[] = "All fields are required.";
}

if (!preg_match("/^[a-zA-Z0-9]*$/", $studentid)) {
    $errors[] = "Student ID can only contain letters and numbers.";
}

if (strlen($password) < 6) {
    $errors[] = "Password must be at least 6 characters long.";
}

if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $errors[] = "Invalid email format.";
}

// Check if there were validation errors
if (!empty($errors)) {
    foreach ($errors as $error) {
        echo "<p>$error</p>";
    }
    echo "<a href='studentsignup.php'>Go back</a>";
    exit();
}

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
        echo "<script>window.location.href='studentsignup.php';</script>";
    } else {
        echo "Error: " . $stmt_insert->error;
    }
}

$stmt_check->close();
$stmt_insert->close();
$conn->close();
?>

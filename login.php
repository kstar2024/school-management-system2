<?php
session_start();
 // Connect to MySQL database
 $servername = "localhost";
 $username = "root";
 $password = "";
 $dbname = "bene";

 $conn = new mysqli($servername, $username, $password, $dbname);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
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
            $_SESSION['student_id'] = $row['id'];
            $_SESSION['studentid'] = $studentid;

            // Redirect to profile page
            header('Location: profile.php');
            exit;
        } else {
            // Password is incorrect
            $error_message = "Username or Password Incorrect";
        }
    } else {
        // User not found
        $error_message = "User not Found";
    }
}

// Close the database connection
$conn->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Great Value Academy School</title>
    <link rel="stylesheet" href="student.css">
</head>
<body>
    <h2>Login</h2>
    <?php
    if (isset($_SESSION['error_message'])) {
        echo '<p class="error">' . $_SESSION['error_message'] . '</p>';
        unset($_SESSION['error_message']);
    }
    if (isset($error_message)) {
        echo '<p class="error">' . $error_message . '</p>';
    }
    ?>
    <form method="POST" action="login.php">
        <label for="studentid">Student ID:</label>
        <input type="text" id="studentid" name="studentid" required>
        
        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required>
        
        <button type="submit">Login</button>
    </form>
</body>
</html>

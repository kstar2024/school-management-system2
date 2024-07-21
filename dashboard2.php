<?php
// Start the session
session_start();

// Check if the user is logged in
if (!isset($_SESSION['studentid'])) {
    header("Location: studentlogin.php");
    exit();
}

// Connect to the database (adjust credentials as necessary)
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "bene";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch student details from the database
$student_id = $_SESSION['studentid'];
$sql = "SELECT username, email FROM studentsignup WHERE studentid = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $studentid);
$stmt->execute();
$stmt->bind_result($username, $email);
$stmt->fetch();
$stmt->close();
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome Dashboard</title>
    <link rel="stylesheet" href="styles.css"> <!-- Add your CSS file here -->
</head>
<body>
    <header>
        <h1>Welcome to the Student Portal</h1>
        <nav>
            <ul>
                <li><a href="grades.php">Grades</a></li>
                <li><a href="assignments.php">Assignments</a></li>
                <li><a href="attendance.php">Attendance</a></li>
                <li><a href="fee-payment.php">Fee Payment</a></li>
                <li><a href="studentlogout.php">Logout</a></li>
            </ul>
        </nav>
    </header>
    <main>
        <h2>Hello, <?php echo htmlspecialchars($username . ' ' . $email); ?>!</h2>
        <p>Welcome back to your student portal. Use the navigation above to access your grades, assignments, attendance, and fee payment information.</p>
    </main>
    <footer>
        <p>&copy; 2024 Great Value Academy School</p>
    </footer>
</body>
</html>

<?php
// Database credentials
$servername = "localhost";
$username = "root"; // Replace with your MySQL username
$password = ""; // Replace with your MySQL password
$dbname = "bene"; // Replace with your database name

// Connect to the database
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Sample assignment details
$assignments = [
    ['assignment_name' => 'Homework 1', 'description' => 'Solve exercises 1-10', 'due_date' => '2024-08-01'],
    ['assignment_name' => 'Project 1', 'description' => 'Complete the group project', 'due_date' => '2024-08-15'],
    ['assignment_name' => 'Quiz 1', 'description' => 'Prepare for the quiz on chapters 1-3', 'due_date' => '2024-08-20'],
    // Add more assignments as needed
];

// Check if the description column exists and create it if not
$check_column_sql = "SHOW COLUMNS FROM assignments LIKE 'description'";
$check_column_result = $conn->query($check_column_sql);

if ($check_column_result->num_rows == 0) {
    // Add the description column if it does not exist
    $alter_table_sql = "ALTER TABLE assignments ADD COLUMN description TEXT";
    if (!$conn->query($alter_table_sql)) {
        die("Error adding column: " . $conn->error);
    }
}

// Fetch all class IDs
$sql = "SELECT class_id FROM classes";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Prepare the SQL statement to insert assignments
    $sql = "INSERT INTO assignments (class_id, assignment_name, description, due_date) VALUES (?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);

    // Insert each assignment into each class
    while ($row = $result->fetch_assoc()) {
        $class_id = $row['class_id'];
        foreach ($assignments as $assignment) {
            $assignment_name = $assignment['assignment_name'];
            $description = $assignment['description'];
            $due_date = $assignment['due_date'];

            $stmt->bind_param("isss", $class_id, $assignment_name, $description, $due_date);
            if (!$stmt->execute()) {
                echo "Error inserting assignment: " . $stmt->error . "<br>";
            }
        }
    }
    echo "Assignments have been posted to all classes.";
} else {
    echo "No classes found to assign assignments.";
}

$stmt->close();
$conn->close();
?>

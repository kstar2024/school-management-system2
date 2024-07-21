<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Great Value Academy Student Portal - Assignments</title>
    <link rel="stylesheet" href="studentdash.css"> <!-- Changed CSS file to reflect student portal -->
</head>
<body>
    <!-- Header Section -->
    <header>
        <h1>Great Value Academy Student Portal</h1>
        <nav>
            <ul>
                <li><a href="dashboard.php">Dashboard</a></li>
                <li><a href="application.php">Apply</a></li>
                <li><a href="viewgrades.php">View Grades</a></li>
                <li><a href="assignments.php">Assignments</a></li>
                <li><a href="messages.php">Messages</a></li>
                <li><a href="profile.php">Profile</a></li>
                <li><a href="studentlogout.php">Logout</a></li>
            </ul>
        </nav>
    </header>

    <!-- Main Content Section -->
    <main>
        <!-- Assignments Section -->
        <section id="assignments">
            <h2>Assignments</h2>
            <!-- Form for submitting assignments -->
            <form id="submit-assignment-form" action="upload_assignment.php" method="post" enctype="multipart/form-data">
                <label for="class-select">Select Class:</label>
                <select id="class-select" name="class_id" required>
                    <?php
                    // Start session
                    session_start();

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
                    
                    // Fetch classes
                    $sql = "SELECT class_id, class_name FROM classes";
                    $result = $conn->query($sql);
                    
                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            echo "<option value='" . htmlspecialchars($row['class_id']) . "'>" . htmlspecialchars($row['class_name']) . "</option>";
                        }
                    } else {
                        echo "<option value=''>No classes available</option>";
                    }
                    
                    $conn->close();
                    ?>
                </select>
                <label for="assignment-file">Upload Assignment:</label>
                <input type="file" id="assignment-file" name="assignment_file" required>
                <button type="submit">Submit Assignment</button>
            </form>

            <h3>Submitted Assignments</h3>
            <ul id="submitted-assignments">
                <?php
               

                // Connect to the database
                $conn = new mysqli($servername, $username, $password, $dbname);
                
                // Check connection
                if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                }

                // Fetch submitted assignments for the logged-in student
                if (isset($_SESSION['student_id'])) {
                    $student_id = $_SESSION['student_id'];
                    $sql = "SELECT c.class_name, a.assignment_name, a.submission_date FROM assignments a
                            JOIN classes c ON a.class_id = c.class_id
                            WHERE a.student_id = ?";
                    $stmt = $conn->prepare($sql);
                    $stmt->bind_param("i", $student_id);
                    $stmt->execute();
                    $result = $stmt->get_result();
                    
                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            echo "<li>" . htmlspecialchars($row['class_name']) . " - " . htmlspecialchars($row['assignment_name']) . " (Submitted on: " . htmlspecialchars($row['submission_date']) . ")</li>";
                        }
                    } else {
                        echo "<li>No assignments submitted yet</li>";
                    }

                    $stmt->close();
                } else {
                    echo "<li>Please log in to view your submitted assignments</li>";
                }

                $conn->close();
                ?>
            </ul>
        </section>
    </main>

    <script src="studentsignup.js"></script> <!-- Changed JavaScript file to reflect student portal -->
</body>
</html>

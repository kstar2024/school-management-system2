<?php
session_start();
// Connect to MySQL database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "bene";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if the student_id is set in the session
if (!isset($_SESSION['student_id'])) {
    $_SESSION['error_message'] = "Please log in to access your profile.";
    header("Location:loginstudent.php");
    exit();
}

$student_id = $_SESSION['student_id'];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Handle form submission for updating profile
    $name = $_POST['name'];
    $email = $_POST['email'];
    $grade = $_POST['grade'];

    $update_sql = "UPDATE students SET name='$name', email='$email', grade='$grade' WHERE id='$student_id'";
    if ($conn->query($update_sql) === TRUE) {
        $success_message = "Profile updated successfully.";
    } else {
        $error_message = "Error updating profile: " . $conn->error;
    }
}

// Fetch the student's profile information
$sql = "SELECT * FROM studentsignup WHERE id='$student_id'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $student = $result->fetch_assoc();
} else {
    die("Student not found.");
}

$conn->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Portal - Great Value Academy School</title>
    <link rel="stylesheet" href="student.css">
</head>
<body>
    <p>Welcome to Student Portal</p>
    <main>
        <!-- Student Dashboard Section -->
        <section class="student-dashboard">
            <div class="profile-section">
                <h2>Student Profile</h2>
                <img id="profile-pic" src="teacher1.jpg" alt="Profile Picture">
                <p id="student-name">Name: <span><?php echo htmlspecialchars($student['username']); ?></span></p>
                
                <p id="student-email">Email: <span><?php echo htmlspecialchars($student['email']); ?></span></p>
                <button id="editProfileBtn">Edit Profile</button>
            </div>

            <!-- Academic Performance Section -->
            <div class="academic-performance">
                <h2>Academic Performance</h2>
                <table id="performance-table">
                    <thead>
                        <tr>
                            <th>Subject</th>
                            <th>Grade</th>
                            <th>Remarks</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Mathematics</td>
                            <td>A</td>
                            <td>Excellent</td>
                        </tr>
                        <tr>
                            <td>Science</td>
                            <td>B+</td>
                            <td>Good</td>
                        </tr>
                        <!-- Add more rows as needed -->
                    </tbody>
                </table>
            </div>

            <!-- Class Schedule Section -->
            <div class="class-schedule">
                <h2>Class Schedule</h2>
                <div id="class-schedule-content">
                    <p>Monday: Math, Science</p>
                    <p>Tuesday: English, History</p>
                    <!-- Add more schedule details -->
                </div>
            </div>

            <!-- Assignments Section -->
            <div class="assignments">
                <h2>Assignments</h2>
                <ul id="assignments-list">
                    <li>Math Homework - Due: July 25, 2024</li>
                    <li>Science Project - Due: August 5, 2024</li>
                    <!-- Add more assignments as needed -->
                </ul>
            </div>

            <!-- Attendance Section -->
            <div class="attendance">
                <h2>Attendance</h2>
                <p id="attendance-percentage">Attendance Percentage: <span>95%</span></p>
                <table id="attendance-table">
                    <thead>
                        <tr>
                            <th>Date</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>July 1, 2024</td>
                            <td>Present</td>
                        </tr>
                        <tr>
                            <td>July 2, 2024</td>
                            <td>Absent</td>
                        </tr>
                        <!-- Add more attendance records -->
                    </tbody>
                </table>
            </div>

            <!-- Extracurricular Activities Section -->
            <div class="extracurricular-activities">
                <h2>Extracurricular Activities</h2>
                <p id="extracurricular-activities-content">Football, Debate Club, Art Class</p>
            </div>

            <!-- Notices and Announcements Section -->
            <div class="notices-announcements">
                <h2>Notices and Announcements</h2>
                <ul id="notices-list">
                    <li>Parent-Teacher Meeting - July 30, 2024</li>
                    <li>Summer Camp Registration - Open until August 15, 2024</li>
                    <!-- Add more notices as needed -->
                </ul>
            </div>

            <!-- Resources Section -->
            <div class="resources">
                <h2>Resources</h2>
                <ul id="resources-list">
                    <li><a href="#">Mathematics Practice Sheets</a></li>
                    <li><a href="#">Science Experiment Guides</a></li>
                    <!-- Add more resources as needed -->
                </ul>
            </div>

            <!-- Contact Teachers Section -->
            <div class="contact-teachers">
                <h2>Contact Teachers</h2>
                <div id="teachers-contact">
                    <p>Mr. Smith (Math): <a href="mailto:mr.smith@example.com">Email</a></p>
                    <p>Ms. Johnson (Science): <a href="mailto:ms.johnson@example.com">Email</a></p>
                    <!-- Add more contact information -->
                </div>
            </div>

            <!-- Calendar Section -->
            <div class="calendar-section">
                <h2>Calendar</h2>
                <div id="calendar">
                    <!-- Embed or add calendar details here -->
                </div>
            </div>

            <!-- Chat Section -->
            <div class="chat-section">
                <h2>Chat with Teachers</h2>
                <div class="chat-box" id="chatBox">
                    <!-- Chat messages will be dynamically added here -->
                </div>
                <input type="text" id="chatInput" placeholder="Type a message...">
                <button id="sendMessageBtn">Send</button>
            </div>
        </section>
    </main>

    <!-- Footer Section -->
    <footer>
        <ul>
            <li><a href="privacy.html">Privacy Policy</a></li>
            <li><a href="terms.html">Terms of Service</a></li>
        </ul>
        <p>&copy; 2024 Great Value Academy School. All rights reserved.</p>
    </footer>

    <script src="student.js"></script>
</body>
</html>

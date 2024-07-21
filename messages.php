
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Great Value Academy Student Portal - Messages</title>
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
        <!-- Messages Section -->
        <section id="messages">
            <h2>Messages</h2>
            <form id="send-message-form" action="send_message.php" method="post">
                <label for="recipient">Recipient:</label>
                <input type="text" id="recipient" name="recipient" required>
                <label for="message-content">Message:</label>
                <textarea id="message-content" name="message_content" required></textarea>
                <button type="submit">Send Message</button>
            </form>
            <h3>Inbox</h3>
            <ul id="inbox">
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

                // Fetch messages for the logged-in student
                if (isset($_SESSION['student_id'])) {
                    $student_id = $_SESSION['student_id'];
                    $sql = "SELECT sender, message_content, sent_time FROM messages
                            WHERE recipient = ?
                            ORDER BY sent_time DESC";
                    $stmt = $conn->prepare($sql);
                    $stmt->bind_param("i", $student_id);
                    $stmt->execute();
                    $result = $stmt->get_result();
                    
                    if ($result->num_rows > 0) {
                        while($row = $result->fetch_assoc()) {
                            echo "<li><strong>" . htmlspecialchars($row['sender']) . ":</strong> " . htmlspecialchars($row['message_content']) . " <em>(Sent on: " . htmlspecialchars($row['sent_time']) . ")</em></li>";
                        }
                    } else {
                        echo "<li>No messages in your inbox</li>";
                    }

                    $stmt->close();
                } else {
                    echo "<li>Please log in to view your messages</li>";
                }

                $conn->close();
                ?>
            </ul>
        </section>
    </main>

    <script src="studentsignup.js"></script> <!-- Changed JavaScript file to reflect student portal -->
</body>
</html>

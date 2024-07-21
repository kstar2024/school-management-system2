<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Great Value Academy Student Portal</title>
    <link rel="stylesheet" href="studentdash.css"> <!-- Changed CSS file to reflect student portal -->
</head>
<body>
    <!-- Header Section -->
    <header>
        <h1>Great Value Academy Admin Portal</h1>
        <nav>
            <ul>
                <li><a href="adminuserreg.php">Register Users</a></li>
               <li><a href="applicationspage.php">Applications</a></li>
                <li><a href="#viewGrades">View Grades</a></li>
                <li><a href="#assignments">Assignments</a></li>
                <li><a href="#messages">Messages</a></li>




                <li><a href="#profile">Profile</a></li>
                <li><a href="adminuserlogout.php">Logout</a></li>
            </ul>
        </nav>
    </header>

    <!-- Main Content Section -->
    <main>
    

        <!-- Student Portal Section -->
        <section class="student-portal" id="studentPortal" style="display: none;">
            <!-- Dashboard Section -->
            <section id="dashboard">
                <h2>Dashboard</h2>
                <div class="widget">
                    <h3>Upcoming Assignments</h3>
                    <ul id="assignment-list"></ul>
                </div>
                <div class="widget">
                    <h3>Notifications</h3>
                    <ul id="notification-list"></ul>
                </div>
            </section>
            
            <!-- My Classes Section -->
            <section id="myClasses">
                <h2>My Classes</h2>
                <ul id="my-classes"></ul>
            </section>

            <!-- View Grades Section -->
            <section id="viewGrades">
                <h2>View Grades</h2>
                <ul id="grades-list"></ul>
            </section>

            <!-- Assignments Section -->
            <section id="assignments">
                <h2>Assignments</h2>
                <form id="submit-assignment-form">
                    <label for="class-select">Select Class:</label>
                    <select id="class-select" name="class-select" required></select>
                    <label for="assignment-file">Upload Assignment:</label>
                    <input type="file" id="assignment-file" name="assignment-file" required>
                    <button type="submit">Submit Assignment</button>
                </form>
                <h3>Submitted Assignments</h3>
                <ul id="submitted-assignments"></ul>
            </section>
            
            <!-- Messages Section -->
            <section id="messages">
                <h2>Messages</h2>
                <form id="send-message-form">
                    <label for="recipient">Recipient:</label>
                    <input type="text" id="recipient" name="recipient" required>
                    <label for="message-content">Message:</label>
                    <textarea id="message-content" name="message-content" required></textarea>
                    <button type="submit">Send Message</button>
                </form>
                <h3>Inbox</h3>
                <ul id="inbox"></ul>
            </section>

            <!-- Profile Section -->
            <section id="profile">
                <h2>Profile</h2>
                <form id="update-profile-form">
                    <label for="profile-name">Name:</label>
                    <input type="text" id="profile-name" name="profile-name" required>
                    <label for="profile-email">Email:</label>
                    <input type="email" id="profile-email" name="profile-email" required>
                    <button type="submit">Update Profile</button>
                </form>
            </section>
        </section>
    </main>
    
    <script src="studentsignup.js"></script> <!-- Changed JavaScript file to reflect student portal -->
    <script>
        function showSignUp() {
            document.getElementById('loginContainer').style.display = 'none';
            document.getElementById('signupContainer').style.display = 'block';
        }
        
        function showLogin() {
            document.getElementById('signupContainer').style.display = 'none';
            document.getElementById('loginContainer').style.display = 'block';
        }
    </script>
</body>
</html>

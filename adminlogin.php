<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Adminportal</title>
    <link rel="stylesheet" href="studentsignup.css"> <!-- Changed CSS file to reflect student portal -->
</head>
<body>
    <!-- Header Section -->
    <header>
        <h1> Login Portal</h1>
        <h3><a href="home.php">Back</a></h3>
        <nav>
            <ul>
              <!-- <li><a href="#dashboard">Dashboard</a></li>
                <li><a href="#myClasses">My Application</a></li> -->
             
            </ul>
        </nav>
    </header>

    <!-- Main Content Section -->
    <main>
        <!-- Login Section -->
     <section class="login-container" id="loginContainer">
            <h2>User Login</h2>
            <form id="loginForm" action="adminlogindb.php" method="POST">
                <div class="form-group">
                    <label for="studentId">User ID</label>
                    <input type="text" id="studentId" name="adminid" required>
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" id="password" name="password" required>
                </div>
                <button type="submit">Login</button>
                <p id="error-message" style="color: red;"></p>
             <!--   <p>Don't have an account? <a href="studentsignup.php">Sign up here</a></p>-->
            </form>
        </section>

       

        <!-- Student Portal Section 
        <section class="student-portal" id="studentPortal" style="display: none;">
            Dashboard Section -->
          <!--  <section id="dashboard">
                <h2>Dashboard</h2>
                <div class="widget">
                    <h3>My Application</h3>
                    <ul id="assignment-list"></ul>
                </div>
               
            </section>-->

              
    
  <!--<script src="studentsignup.js"></script>--> <!-- Changed JavaScript file to reflect student portal 
  <script>
        function showSignUp() {
            document.getElementById('loginContainer').style.display = 'none';
            document.getElementById('signupContainer').style.display = 'block';
        }
        
        function showLogin() {
            document.getElementById('signupContainer').style.display = 'none';
            document.getElementById('loginContainer').style.display = 'block';
        }
    </script> -->
</body>
</html>
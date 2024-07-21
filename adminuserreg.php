<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Admin User Registration</title>
    <link rel="stylesheet" href="studentsignup.css"> <!-- Changed CSS file to reflect student portal -->
</head>
<body>
    <!-- Header Section -->
    <header>
        <h1>Admin User Registration</h1>
        <h3><a href="adminlogin.php">Back</a></h3>
        <nav>
            <ul>
              <!-- <li><a href="#dashboard">Dashboard</a></li>
                <li><a href="#myClasses">My Application</a></li> -->
             
            </ul>
        </nav>
    </header>

    <!-- Main Content Section -->
    <main>
      

        <!--Sign-Up Section -->
        <section class="signup-container" id="signupContainer" style=";">
            <h1> User Registration</h1>
            <form id="signupForm" action="adminuserregdb.php" method="POST">
                <div class="form-group">
                    <label for="studentIdSignup">User ID </label>
                    <input type="text" id="studentid" name="adminid" required>
                </div>
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" id="name" name="adminame" required>
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" id="email" name="email" required>
                </div>
                <div class="form-group">
                    <label for="passwordSignup">Password</label>
                    <input type="password" id="password" name="password" required>
                </div>
                <input type= "submit" name="Sign Up" value= "Submit">
                <!-- <p>Already have an account? <a href="studentlogin.php">Login here</a></p> -->
            </form>
        </section>


              
    
 <script src=""></script> <!-- Changed JavaScript file to reflect student portal -->
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
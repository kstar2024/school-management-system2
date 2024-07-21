<?php
    session_start();
    
    include("dab.php");

    if($_SERVER[ 'REQUEST_METHOD'] == "POST")  {

    $bcn = $_POST['bcn'];

     // Check if birth certificate number already exists
     $sql = "SELECT * FROM reg WHERE bcn = ?";
     $stmt = $conn->prepare($sql);
     $stmt->bind_param("s", $bcn);
     $stmt->execute();
     $result = $stmt->get_result();
 
     if ($result->num_rows > 0) {
         // Duplicate found
         echo "<script type='text/javascript'> alert ('Your application exist')</script>";
         // You can handle the error here, prevent form submission, etc.
         //exit(); // Exit or return to prevent further execution
     } else {
         // No duplicate found, proceed with insertion
  
        $fullname = $_POST['fullname'];
        $dob = $_POST['dob'];
        $bcn = $_POST['bcn'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $address = $_POST['address'];
        $pschool = $_POST['pschool'];
        $grade = $_POST['grade'];

         // Insert data into database
         $sql_insert = "INSERT INTO reg (fullname, dob, bcn, email, phone, address, pschool, grade) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
         $stmt_insert = $conn->prepare($sql_insert);
         $stmt_insert->bind_param("ssssssss", $fullname, $dob, $bcn, $email, $phone, $address, $pschool, $grade);
         
         if ($stmt_insert->execute()) {
            echo "<script type='text/javascript'> alert ('Your Application Has Been Submitted Successfully.')</script>";
            header("refresh:0; url=studentdash.php");
            // Handle success as needed
        } else {
            echo "Error: " . $sql_insert . "<br>" . $conn->error;
            // Handle error
        }

        $stmt_insert->close();
    }

    $stmt->close();
}

$conn->close();


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Great Value Academy Admission Portal</title>
    <link rel="stylesheet" href="admisionportal.css">
</head>
<body>
    <header>
        <h1>Great Value Academy Admission Portal</h1>
    </header>
    <main>
      <li><a href="studentdash.php">Home</a></li>
        <section id="application-form">
            <h2>Apply Now</h2>
            <form id="admission-form" method="POST">
                <div class="form-group">
                    <label for="fullname">Full Name:</label>
                    <input type="text" id="full-name" name="fullname" required>
                </div>
                <div class="form-group">
                    <label for="date-of-birth">Date of Birth:</label>
                    <input type="date" id="date-of-birth" name="dob" required>
                </div>
                <div class="form-group">
                    <label for="bcn">Birth Certificate Number</label>
                    <input type="text" id="bcn" name="bcn" required>
                </div>
                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="email" id="email" name="email" required>
                </div>
                <div class="form-group">
                    <label for="phone-number">Phone Number:</label>
                    <input type="tel" id="phone-number" name="phone" required>
                </div>
                <div class="form-group">
                    <label for="address">Address:</label>
                    <textarea id="address" name="address" required></textarea>
                </div>
                <div class="form-group">
                    <label for="previous-school">Previous School:</label>
                    <input type="text" id="previous" name="pschool" required>
                </div>
                <div class="form-group">
                    <label for="grade-level">Grade Level:</label>
                    <select id="grade" name="grade" required>
                        <option value="">Select Grade</option>
                        <option value="grade-1">Grade 1</option>
                        <option value="grade-2">Grade 2</option>
                        <option value="grade-3">Grade 3</option>
                        <option value="grade-4">Grade 4</option>
                        <option value="grade-5">Grade 5</option>
                        <option value="grade-6">Grade 6</option>
                        <option value="grade-7">Grade 7 Junior Secondary</option>
                        <option value="grade-8">Grade 8 Junior Secondary</option>
                      
          
                        <!-- Add more grades as needed -->
                    </select>
                </div>
                <input type= "submit" name="Submit Application" value= "Submit">
            </form>
        </section>

        <section id="download-letter">
            <h2>Download Admission Letter</h2>
            <form id="download-form" action="/download-letter" method="post">
                <div class="form-group">
                    <label for="application-id">Application ID:</label>
                    <input type="text" id="application-id" name="application-id" required>
                </div>
                <button type="submit">Download Letter</button>
            </form>
        </section>
    </main>
    <footer>
        <p>&copy; 2024 Great Value Academy. All rights reserved.</p>
    </footer>
    <script src="admisionportal.js"></script>
</body>
</html>

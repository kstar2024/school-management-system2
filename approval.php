<?php
// Connect to your MySQL database (change these parameters as per your setup)
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "bene";
?>
<!DOCTYPE html>
<html>
<head>
    <title>Approval System</title>
</head>
<body>
    <h2>Items List</h2>
    <ul>
    <?php
    // Connect to your MySQL database (same as above)
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Fetch items from database
    $sql = "SELECT * FROM ben";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Output data of each row
        while($row = $result->fetch_assoc()) {
            echo "<li>" . $row["name"];
            // Display approval button if not already approved
            if ($row["status"] == 0) {
                echo " <a href='reg.php?id=" . $row["id"] . "'>Approve</a>";
            }
            echo "</li>";
        }
    } else {
        echo "0 results";
    }

    $conn->close();
    ?>
    </ul>
</body>
</html>
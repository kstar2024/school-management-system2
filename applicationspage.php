<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Approval/Reject </title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        table th, table td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        .approve-link, .reject-link {
            display: inline-block;
            padding: 5px 10px;
            margin-right: 10px;
            text-decoration: none;
            color: #fff;
            background-color: #5cb85c; /* green */
            border: 1px solid #4cae4c; /* darker green */
            border-radius: 3px;
}

        .reject-link {
            background-color: #d9534f; /* red */
            border: 1px solid #d43f3a; /* darker red */
        }

    
        </style>
</head>
<body>
    <h2>Registration Approval/Reject</h2>
    <table border="1">
        <thead>
            <tr>
            <th>Admission No</th>
            <th>Full Name</th>
            <th>Date of Birth</th>
                <th>Birth Cert. No</th>
                <th>Email</th>
                <th>Phone No:</th>
                <th>Address</th>
                <th>Prev. School</th>
                <th>Level</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
            // Connect to MySQL database
            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "bene";

            $conn = new mysqli($servername, $username, $password, $dbname);
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            // Fetch data from MySQL
            $sql = "SELECT id,fullname, dob, bcn, phone, email, phone, address, pschool, grade FROM reg WHERE status ='pending'";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                // Output data of each row
                while($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $row["id"] . "</td>";
                    echo "<td>" . $row["fullname"] . "</td>";
                    echo "<td>" . $row["dob"] . "</td>";
                    echo "<td>" . $row["bcn"] . "</td>";
                    echo "<td>" . $row["email"] . "</td>";
                    echo "<td>" . $row["phone"] . "</td>";
                 
                    echo "<td>" . $row["address"] . "</td>";
                    echo "<td>" . $row["pschool"] . "</td>";
                    echo "<td>" . $row["grade"] . "</td>";
                    echo "<td>";
                
                    echo "<a href='approverequest.php?id=" . $row["id"] . "&action=approve'>Approve</a> | ";
                    echo "<a href='approverequest.php?id=" . $row["id"] . "&action=reject'>Reject</a>";
                    echo "</form>";
                    echo "</td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='4'>No data found</td></tr>";
            }
            $conn->close();
            ?>
        </tbody>
    </table>
</body>
</html>


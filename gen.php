<?php
// Include the TCPDF library
require_once('AutoLoad.php');  // Adjust the path as necessary
require_once('tcpdf/tcpdf.php');

// Database connection parameters
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "bene";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch data from database
$sql = "SELECT id, fullname, email FROM reg";
$result = $conn->query($sql);

// Initialize TCPDF
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// Set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('Your Name');
$pdf->SetTitle('Users List');
$pdf->SetSubject('Generating PDF from Database');
$pdf->SetKeywords('PDF, TCPDF, example, PHP, MySQL');

// Set default header and footer fonts
$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

// Set margins
$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

// Add a page
$pdf->AddPage();

// Set some content to display
$html = '<h1>Users List</h1>
         <table border="1">
            <tr>
                <th>ID</th>
                <th>Fullname</th>
                <th>Email</th>
            </tr>';

// Loop through data and add to HTML table
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $html .= '<tr>
                    <td>'.$row['id'].'</td>
                    <td>'.$row['fullname'].'</td>
                    <td>'.$row['email'].'</td>
                  </tr>';
    }
    $html .= '</table>';
} else {
    $html .= '<tr><td colspan="3">No users found</td></tr></table>';
}

// Output the HTML content
$pdf->writeHTML($html, true, false, true, false, '');

// Close and output PDF document
$pdf->Output('users_list.pdf', 'D');  // 'D' for force download

// Close MySQL connection
$conn->close();
?>
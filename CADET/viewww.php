<?php
// Replace these with your actual database credentials
$servername = "localhost";
$username = "root";
$password = "";
$database = "ncc";

// Create a database connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

session_start();
$username = $_SESSION['uname'];
$sql = "SELECT ncc_unit_enrolled FROM enroll where regimental_number='$username'";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
$unit = $row['ncc_unit_enrolled'];
$years = date('Y');

$sql = "SELECT file_name, file_content FROM pdf_files where unit='$unit' and years=$years";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $fileName = $row['file_name'];
    $fileContent = $row['file_content'];

    // Set headers for PDF display
    header("Content-Type: application/pdf");
    header("Content-Disposition: inline; filename='$fileName'");
    
    // Calculate and set the correct content length
    header("Content-Length: " . strlen($fileContent));
    
    // Output the PDF content
    
    echo $fileContent;
} else {
    echo "PDF not found in the database.";
}

// Close the database connection
$conn->close();
?>

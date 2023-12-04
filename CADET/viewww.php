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
$sql = "SELECT ncc_unit_enrolled FROM enroll where regimental_number='$username'"; // Change 'id' to match the PDF record you want to retrieve
$result = $conn->query($sql);
$row = $result->fetch_assoc();
$unit=$row['ncc_unit_enrolled'];
$folderPath = ($unit == '10A') ? '../Ncc_ano1/uploads/' : '../Ncc_ano2/uploads/';

// Retrieve the PDF data from the database
$years = date('Y');
$sql = "SELECT * FROM files where unit='$unit' and year=$years"; // Change 'id' to match the PDF record you want to retrieve
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $fileName = $row['file_name'];
    $filePath = $folderPath . $row['filename']; // Adjust the path based on the folder structure
    
    // Serve the file to the user for download or display
    header('Content-Type: application/pdf');
    header('Content-Disposition: inline; filename="' . $row['filename'] . '"');
    readfile($filePath); // Output the file
} else {
    echo "PDF not found in the database.";
}

// Close the database connection
$conn->close();
?>

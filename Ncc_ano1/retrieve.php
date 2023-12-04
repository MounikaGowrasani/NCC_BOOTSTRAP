<?php
// Database connection
$dbHost = 'localhost';
$dbUser = 'root';
$dbPass = '';
$dbName = 'ncc';

$conn = new mysqli($dbHost, $dbUser, $dbPass, $dbName);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$years = date("Y");

$sql = "SELECT * FROM files WHERE year='$years' and unit='10A'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    
    // File path stored in the database
    $filePath = $row['filepath'];
    
    // Serve the file to the user for download or display
    header('Content-Type: application/pdf');
    header('Content-Disposition: inline; filename="' . $row['filename'] . '"');
    readfile($filePath); // Output the file
} else {
    echo "File not found.";
}

$conn->close();
?>

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

// Retrieve the PDF data from the database
$years=date('Y');
$sql = "SELECT file_name, file_content FROM pdf_files where unit= '25A' AND years = $years"; // Change 'id' to match the PDF record you want to retrieve
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $fileName = $row['file_name'];
    $fileContent = $row['file_content'];

    // Set headers for PDF download
    header("Content-Type: application/pdf");
    header("Content-Disposition: inline; filename='$fileName'");
    header("Content-Length: " . strlen($fileContent));
    
    // Output the PDF content
    echo $fileContent;
} else {
    echo "PDF not found in the database.";
}

// Close the database connection
$conn->close();
?>

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

// Get data from the form
$eventName = $_POST['eventName'];
$eventType = $_POST['eventType'];
$startDate = $_POST['startDate'];
$endDate = $_POST['endDate'];

// Generate the event ID (concatenation of eventName and current year)
$currentYear = date("Y"); // Get the current year
$eventID = $eventName ."@".'2022';
// Insert data into the database
$sql = "INSERT INTO events 
        VALUES ('$eventID', '$eventName', '$eventType', '$startDate', '$endDate')";

if ($conn->query($sql) === TRUE) {
    echo "<script>alert('Event details inserted successfully.');window.history.back();location.reload();</script>";

} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

// Close the database connection
$conn->close();
?>

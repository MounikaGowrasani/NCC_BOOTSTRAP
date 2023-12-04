<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['file'])) {
    // File upload directory
    $uploadDir = 'uploads/';

    // File details
    $fileName = $_FILES['file']['name'];
    $fileType = $_FILES['file']['type'];
    $fileTmpName = $_FILES['file']['tmp_name'];

    // Move the uploaded file to the desired directory
    $targetFilePath = $uploadDir . basename($fileName);

  
        // Database connection
        $dbHost = 'localhost';
        $dbUser = 'root';
        $dbPass = '';
        $dbName = 'ncc';
        $unit='10A';
        $years = date("Y");

        $conn = new mysqli($dbHost, $dbUser, $dbPass, $dbName);

        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        $sql = "SELECT * FROM files WHERE year = ? and unit= ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("is", $years,$unit);

        if ($stmt->execute()) {
            $result = $stmt->get_result();

            if ($result->num_rows > 0) {
                // Year already exists, display an alert
                echo "<script>alert('Year $years schedule already uploaded'); window.history.back();</script>";
            } else {
                $stmt->close(); // Close the previous statement

        // Insert file metadata into the database
        $sql = "INSERT INTO files (filename, filetype, filepath,unit,year) VALUES ('$fileName', '$fileType', '$targetFilePath','10A',$years)";

        if ($conn->query($sql) === TRUE) {
            if (move_uploaded_file($fileTmpName, $targetFilePath)) {
            echo "File uploaded successfully.";
            }
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
       

        
    }
    }
}
    
?>
<!DOCTYPE html>
<html>
<head>
    <center><title>Feedback Table</title></center>
    <style>
        /* Apply styles to the table */
        body{
            
        }
        table {
            border-collapse: collapse;
            width: 80%;
            margin: 20px auto;
        }

        /* Style table headers */
        th {
    background-color: #cce6ff;/* Light Blue */
  }

        /* Style table rows */
        tr:nth-child(even) {
    background-color:#e1f6ff; /* Light Blue */
  }
  tr:nth-child(odd) {
    background-color:  #f0f8ff; /* Light Light Blue */
  }

        /* Style table cells */
        td, th {
            padding: 8px;
            border: 1px solid #ddd;
        }
    </style>

</head>
<body>
 
<?php
// Database connection parameters
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "ncc";

// Create a database connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check if the connection is successful
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$query="SELECT * FROM feedback ";


    // Execute the query
    $result = $conn->query($query);

    if ($result->num_rows > 0) {
        echo '<table border="1">';
        echo '<tr><th>Registration Number</th><th>Feedback</th><th>Rating</th><th>Feedback Date</th></tr>';
        
        while ($row = $result->fetch_assoc()) {
            echo '<tr>';
            echo '<td>' . $row['regno'] . '</td>';
            echo '<td>' . $row['feedback'] . '</td>';
            echo '<td>' . $row['rating'] . '</td>';
            echo '<td>' . $row['feedbackdate'] . '</td>';
            
            echo '</tr>';
        }
        
        echo '</table>';
    } else {
        echo 'No feedback data found.';
    }

    // Close the database connection
    $conn->close();
    ?>

<br>

</body>
</html>


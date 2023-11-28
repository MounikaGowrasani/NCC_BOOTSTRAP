<?php
// Start the session to access session variables
session_start();
// Check if the 'uname' session variable exists
if (isset($_SESSION['uname'])) {
   
    $username = $_SESSION['uname'];
    echo $username;
    
    $query = "SELECT stu_name,pno,Registration_number FROM enroll WHERE regimental_number = '$username'";
    $result = $conn->query($query);

    if ($result->num_rows > 0) {
        // Output data of the student
       
        while ($row = $result->fetch_assoc()) {
            $studentName = $row['stu_name'];
            $mno=$row['pno'];
            $regno=$row['Registration_number'];
            echo $studentName;
        }
    } else {
        echo "Student not found.";
    }

    // Close the result set
    $result->close();
   
}
 else
    echo "log out";
?>
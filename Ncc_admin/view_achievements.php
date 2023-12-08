<?php
  session_start();
  ?>
<!DOCTYPE html>
<html>
<head>
    <title>Cadet Achievements</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }

        h2 {
            margin-bottom: 10px;
        }

        form {
            margin-bottom: 20px;
        }

        form label,
        form select,
        form input[type="submit"] {
            margin-right: 10px;
        }

        .achievement {
            border: 1px solid #ccc;
            padding: 10px;
            margin-bottom: 20px;
        }

        .description {
            margin-bottom: 10px;
        }

        .actions {
            margin-top: 10px;
        }

        .actions a {
            display: inline-block;
            padding: 5px 10px;
            margin-right: 10px;
            text-decoration: none;
            background-color: #01579b;
            border: 1px solid #ccc;
            color: #fff;
            transition: background-color 0.3s, color 0.3s;
            border-radius: 5px;
        }

        .actions a:hover {
            background-color: #012970;
            color: #fff;
        }
    </style>
</head>
<body>
    <h2>Select Year to View Achievements</h2>
    <form method="post" action="">
        <label for="year">Select Year:</label>
        <select name="year" id="year">
            <?php
            // Assuming a range of years you want to display (e.g., 2020 to the current year)
            $currentYear = date("Y");
            for ($year = $currentYear; $year >= $currentyear-10; $year--) {
                echo "<option value='$year'>$year</option>";
            }
            ?>
        </select>
        <input type="submit" name="submit" value="View Achievements">


    
<?php

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])) {
    $selectedYear = $_POST['year'];
    // Include your database connection file
   // Start the session

// Check if the session variable for selected year exists
     $_SESSION['selectedYear']=$selectedYear;

    require('C:/xampp/htdocs/NCC_BOOTSTRAP/NCC_LOGIN/dbcon.php');
    // Retrieve achievements including regimental numbers for the selected year
    $sql = "SELECT * FROM cadet_achievements WHERE YEAR= '$selectedYear'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Display achievements information
        echo "<h2>Cadet Achievements for Year $selectedYear</h2>";
        $counter = 1;
        while ($row = $result->fetch_assoc()) {
            echo "<div class='achievement'>";
            echo "<h3>Achievement " . $counter . "</h3>";
            echo "<p><b>Regimental Number: </b>" . $row['regimental_number'] . "</p>";
            // Add further fields from cadet_achievements table as needed
            echo "<p class='description'><b>Description: </b>" . $row['description'] . "</p>";
            echo "<div class='actions'>";
            echo "<a href='" . $row['photo_path'] . "' target='_blank'>View Photo</a>";
            echo "<a href='" . $row['photo_path'] . "' download>Download Photo</a>";
            echo "<a href='" . $row['certificate_path'] . "' target='_blank'>View Certificate</a>";
            echo "<a href='" . $row['certificate_path'] . "' download>Download Certificate</a>";
            echo "</div>"; // end .actions
            echo "</div>"; // end .achievement
            $counter++;
          
        }
        echo "<form method='post' action='export_achievements.php'>";
        echo "<input type='hidden' name='selected_year' value='<?php echo $selectedYear; ?>'>";
        echo "<input type='submit' name='export_excel_btn' value='download'>";
        echo "</form>";
        
        
    } else {
        echo "<p>No achievements found for the selected year.</p>";
    }

    $conn->close();
}
?>

</body>
</html>
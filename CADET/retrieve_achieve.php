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
            border-radius: 5px; /* Adding border radius */
        }

        .actions a:hover {
            background-color: #012970;
            color: #fff;
        } #000;
        
    </style>
</head>
<body>
    <?php
    require('dbcon.php'); // Include your database connection file
    include('session.php'); // Include session handling if required

    // Get the regimental number from the session
    $regimentalNumber = $_SESSION['uname'];

    // Retrieve cadet achievements for a specific regimental number
    $sql = "SELECT * FROM cadet_achievements WHERE regimental_number = '$regimentalNumber'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Display achievements information
        echo "<h2>Cadet Achievements</h2>";
        $counter=1;
        while ($row = $result->fetch_assoc()) {
            
            echo "<div class='achievement'>";
            echo "<h3>Achievement " . $counter . "</h3>"; 
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
    } else {
        echo "<p> No achievements found for this cadet.</p>";
    }

    $conn->close();
    ?>
</body>
</html>

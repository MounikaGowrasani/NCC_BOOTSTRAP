<!DOCTYPE html>
<html>
<head>
    <title>Schedules</title>
    <style>
        body {
            font-family: Arial, sans-serif;
      
            margin: 0;
            padding: 0;
            text-align: center;
        }

        h2 {
            color: #333;
            margin: 10px;
        }

        .container {
            max-width: 400px;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        a {
            text-decoration: none;
            background-color: #01579b;
            color: #fff;
            padding: 10px 20px;
            border-radius: 5px;
            display: inline-block;
            margin-bottom: 10px;
        }

        button {
            margin-top: 10px;
           
        }

        #update {
            margin-top: 20px;
        }
    </style>
</head>
<body>
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "ncc";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

function closeConnection($conn) {
    if ($conn) {
        $conn->close();
    }
}

if (isset($_POST["update"])) {
    try {
        $scheduleType = $_POST['schedule_type'];
        $currentYear = date('Y');

        if (isset($_FILES['schedule_file'])) {
            $fileName = $_FILES['schedule_file']['name'];
            $fileTmpName = $_FILES['schedule_file']['tmp_name'];

            // Check if the uploaded file is a PDF
            if (pathinfo($fileName, PATHINFO_EXTENSION) === 'pdf') {
                // Check the schedule type and assign appropriate target directory
                if ($scheduleType === 'update1') {
                    $targetDir = '../Ncc_ano1/uploads/';
                } else if ($scheduleType === 'update2') {
                    $targetDir = '../Ncc_ano2/uploads/';
                }
                $unit=($scheduleType === 'update1') ?'10A':'25A';
                $targetFilePath = $targetDir . basename($fileName);
                $fixed='/uploads';
                $fixedpath= $fixed . basename($fileName);
                // Move the uploaded file to the target directory
                if (move_uploaded_file($fileTmpName, $targetFilePath)) {
                    $stmt = $conn->prepare("SELECT * FROM files WHERE unit = ? AND year = ?");
                    $stmt->bind_param("si", $unit, $currentYear);
                    $stmt->execute();
                    $result = $stmt->get_result();

                    if ($result->num_rows > 0) {
                        $stmt = $conn->prepare("UPDATE files SET filename = ?, filepath = ? 
                                                WHERE unit = ? AND year = ?");
                        $stmt->bind_param("sssi", $fileName,$fixedpath , $unit, $currentYear);
                    } else {
                        $stmt = $conn->prepare("INSERT INTO files (filename, filepath, unit, year)
                                                VALUES (?, ?, ?, ?)");
                        $stmt->bind_param("sssi", $fileName, $fixedpath, $unit, $currentYear);
                    }

                    if ($stmt->execute()) {
                        echo "<script>alert('File uploaded/updated successfully.');</script>";
                    } else {
                        echo "Error updating file: " . $stmt->error;
                    }
                } else {
                    echo "Error uploading file.";
                }
            } else {
                echo "Error: File must be a PDF.";
            }
        } else {
            echo "Error: File upload failed or no file selected.";
        }
    } catch (Exception $e) {
        echo "Error: " . $e->getMessage();
    } finally {
        closeConnection($conn);
    }
}
?>

    <!-- Rest of your HTML code remains unchanged -->
    

<div class="container">
    <a href="retrieve1.php" target="_self">View ANO1(10A) Schedule</a>
    <br>
    <form action="" method="post" enctype="multipart/form-data">
        <input type="file" name="schedule_file" accept=".pdf">
        <input type="hidden" name="schedule_type" value="update1">
        <button type="submit" name="update" id="update">Update Schedule</button>
    </form>
</div>
<br>
<br>
<div class="container">
    <a href="retrieve2.php">View ANO2(25A) Schedule</a>
    <br>
    <form action="" method="post" enctype="multipart/form-data">
        <input type="file" name="schedule_file" accept=".pdf">
        <input type="hidden" name="schedule_type" value="update2">
        <button type="submit" name="update" id="update">Update Schedule</button>
    </form>
</div>
</body>
</html>
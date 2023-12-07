<!DOCTYPE html>
<html>
<head>
    <title>File Upload</title>
    <style>
        /* Add your CSS styles here if needed */
        body {
            font-family: Arial, sans-serif;
            background-color: #f6f9ff;
            margin: 0;
            padding: 0;
        }

        h2 {
            color: #333;
            margin: 10px;
        }

        form {
            max-width: 400px;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        input[type="file"] {
            width: 60%;
            margin-top: 10px;
            margin-bottom: 10px;
            padding: auto;
        }

        label {
            font-weight: bold;
            margin-bottom: 20px;
        }

        input[type="submit"] {
            background-color: #007bff;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <center>
    <form action="" method="POST" enctype="multipart/form-data">
        <label for="file">UPLOAD MATERIAL:</label>
        <br>
        <center><input type="file" id="file" name="file" accept=".pdf, .ppt, .pptx, .doc, .docx" required><br><br></center>
        <input type="submit" value="Upload File">
        <br>
        <br>

        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_FILES["file"])) {
            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "ncc";

            $conn = new mysqli($servername, $username, $password, $dbname);

            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            $targetDirectory = "uploads/";
            $fileName = $_FILES["file"]["name"];
            $targetPath = $targetDirectory . $fileName;

            if (file_exists($targetPath)) {
                echo "File already exists.";
            } else {
                if (move_uploaded_file($_FILES["file"]["tmp_name"], $targetPath)) {
                    $sql = "INSERT INTO training_materials (file_name1, file_path1) VALUES ('$fileName', '$targetPath')";
                    if ($conn->query($sql) === TRUE) {
                        echo "File uploaded successfully.";
                    } else {
                        echo "Error: " . $sql . "<br>" . $conn->error;
                    }
                } else {
                    echo "Error uploading file.";
                }
            }

            $conn->close();
        }
        ?>

        <a href="retrieve_material.php">View Uploaded Material</a>
    </form></center>
</body>
</html>

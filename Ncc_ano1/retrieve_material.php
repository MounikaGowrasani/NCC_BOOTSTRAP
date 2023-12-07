<!DOCTYPE html>
<html>
<head>
    <title>View Uploaded Material</title>
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

        table {
            width: 80%;
            margin: 20px auto;
            border-collapse: collapse;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #007bff;
            color: #fff;
        }

        .download-link {
            display: inline-block;
            padding: 5px 10px;
            background-color: #007bff;
            color: #fff;
            text-decoration: none;
            border-radius: 5px;
            margin-right: 5px;
        }
    </style>
</head>
<body>
    <center>
        <h2>Uploaded Material</h2>

        <?php
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "ncc";

        $conn = new mysqli($servername, $username, $password, $dbname);

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $sql = "SELECT * FROM training_materials";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            echo "<table>
                    <tr>
                        <th>File Name</th>
                        <th>Action</th>
                    </tr>";

            while ($row = $result->fetch_assoc()) {
                echo "<tr>
                        <td>{$row['file_name1']}</td>
                        <td><a class='download-link' href='download.php?file={$row['file_name1']}'>Download</a></td>
                    </tr>";
            }

            echo "</table>";
        } else {
            echo "No files uploaded yet.";
        }

        $conn->close();
        ?>

        <br>
        <a href="upload_material.php">Back to Upload Page</a>
    </center>
</body>
</html>

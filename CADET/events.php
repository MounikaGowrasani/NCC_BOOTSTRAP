<?php
require('dbcon.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Components / Breadcrumbs - NiceAdmin Bootstrap Template</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.snow.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.bubble.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/vendor/simple-datatables/style.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: NiceAdmin
  * Updated: Nov 17 2023 with Bootstrap v5.3.2
  * Template URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>
  <main id="main" class="main">



    <section class="section">
      <div class="row" style="margin-top: -50px;">
        <div class="col-lg-6">

          <div class="card" >
          <div class="container">
        
        <br>
        <!-- Dropdown menu for camp types -->
        <form method="post" action="">
            <label for="eventType">Select Event :</label>
            <select id="eventType" name="eventType">
                <option value="upcoming">Upcoming Events</option>
                <option value="active">Active Events</option>
                <option value="completed">Completed Events</option>
            </select>
            <input type="submit" value="Show Events">
        </form>

            
        <ul>
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

            // Determine the camp type based on the selected dropdown option
            $eventType = "upcoming"; // Default is upcoming
            if (isset($_POST['eventType'])) {
                $eventType = $_POST['eventType'];
            }

            // Retrieve camp names based on camp type and dates
            $today = date('Y-m-d');
            $sql = "";
            $currentYear=date('Y');
            if ($eventType === 'upcoming') {
                $sql = "SELECT name FROM events WHERE fdate > '$today' AND right(event_id,4)='$currentYear'";
            } elseif ($eventType === 'completed') {
                $sql = "SELECT name FROM events WHERE tdate < '$today' AND right(event_id,4)='$currentYear'";
            } elseif ($eventType === 'active') {
                $sql = "SELECT name FROM events WHERE fdate <= '$today' AND tdate >= '$today' AND right(event_id,4)='$currentYear'";
            }

            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    $eventName = $row['name'];
                    echo "<li><a href='view1.php?eventName=$eventName'>$eventName</a></li>";
                }
            } else {
              echo "<br>";
                echo "No Events found for the selected type.";
            }

            // Close the database connectioN

            $conn->close();
            ?>
        </ul>
    </div>
          </div>


        

         

        </div>

      </div>
    </section>

  </main><!-- End #main -->

 

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/apexcharts/apexcharts.min.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/chart.js/chart.umd.js"></script>
  <script src="assets/vendor/echarts/echarts.min.js"></script>
  <script src="assets/vendor/quill/quill.min.js"></script>
  <script src="assets/vendor/simple-datatables/simple-datatables.js"></script>
  <script src="assets/vendor/tinymce/tinymce.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>
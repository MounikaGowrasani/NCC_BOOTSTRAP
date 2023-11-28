<?php
require('dbcon.php');
?>
<?php include 'session.php';?>
<?php include 'updatepassword.php';?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Components / Accordion - NiceAdmin Bootstrap Template</title>
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

 
  <!-- ======= Header ======= -->
  <header id="header" class="header fixed-top d-flex align-items-center">

    <div class="d-flex align-items-center justify-content-between">
      <a href="index.html" class="logo d-flex align-items-center">
        <img src="assets/img/ncclogo-removebg-preview.png" alt="">
        <span class="d-none d-lg-block">Cadet</span>
      </a>
      <i class="bi bi-list toggle-sidebar-btn"></i>
    </div><!-- End Logo -->

    

    <nav class="header-nav ms-auto">
      <ul class="d-flex align-items-center">


        <li class="nav-item dropdown">

          <a class="nav-link nav-icon" href="#" >
          <span class="d-none d-lg-block">Home</span>
           
          </a><!-- End Notification Icon -->

         

        </li><!-- End Notification Nav -->

        

        <li class="nav-item dropdown pe-3">

          <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
            <img src="assets/img/profile-img.jpeg" alt="Profile" class="rounded-circle">
            <span><?php echo $username; ?></span>
          </a><!-- End Profile Iamge Icon -->

          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
            <li class="dropdown-header">
              <h6><?php echo $studentName; ?></h6>
              <span>Reg no: <?php echo $regno; ?></span><br>
              <span>Mobile no: <?php echo $mno; ?></span>
            </li>
            

           
            <li>
              <hr class="dropdown-divider">
            </li>

         

            <li>
              <a class="dropdown-item d-flex align-items-center" href="#" onclick="showPasswordForm()">
                <i class="bi bi-question-circle"></i>
                <span >Change password</span>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <a class="dropdown-item d-flex align-items-center" href="logout.php">
                <i class="bi bi-box-arrow-right"></i>
                <span >Log Out</span>
              </a>
            </li>

          </ul><!-- End Profile Dropdown Items -->
        </li><!-- End Profile Nav -->

      </ul>
    </nav><!-- End Icons Navigation -->

  </header><!-- End Header -->

  <!-- ======= Sidebar ======= -->
  <aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">
    <div class="d-flex align-items-center justify-content-between">
      <a href="index.html" class="logo d-flex align-items-center">

        
        
      </a>
     
    </div>
  
    <li class="nav-heading">Dashboard</li>

      <li class="nav-item">
        <a class="nav-link collapsed" href="view_schedule.php">
          <i class="bi bi-person"></i>
          <span> View Schedule</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link collapsed" href="eventss.php">
          <i class="bi bi-person"></i>
          <span>View Events</span>
        </a>
      </li>
  


      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#components-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-menu-button-wide"></i><span>Camps</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="components-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="campss.php">
              <i class="bi bi-circle"></i><span>View Camps</span>
            </a>
          </li>
          <li>
            <a href="registered_camps.php">
              <i class="bi bi-circle"></i><span>Registered Camps</span>
            </a>
          </li>
         
        </ul>
      </li><!-- End Components Nav -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="feedback.php">
          <i class="bi bi-person"></i>
          <span>Feedback</span>
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#forms-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-journal-text"></i><span>About NCC</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="forms-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="motto.php">
              <i class="bi bi-circle"></i><span>Motto of NCC</span>
            </a>
          </li>
          <li>
            <a href="pledge.php">
              <i class="bi bi-circle"></i><span>Pledge</span>
            </a>
          </li>
          <li>
            <a href="ncc_flag.php">
              <i class="bi bi-circle"></i><span>NCC Flag</span>
            </a>
          </li>
          <li>
            <a href="ncc_song.php">
              <i class="bi bi-circle"></i><span>NCC Song</span>
            </a>
          </li>
        </ul>
      </li><!-- End Forms Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" href="faq.php">
          <i class="bi bi-question-circle"></i>
          <span>F.A.Q</span>
        </a>
      </li><!-- End F.A.Q Page Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" href="contact.php">
          <i class="bi bi-envelope"></i>
          <span>Contact</span>
        </a>
      </li><!-- End Contact Page Nav -->

    </ul>

  </aside><!-- End Sidebar-->

  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Registered Camps</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.php">Home</a></li>
          <li class="breadcrumb-item">Camps</li>
          <li class="breadcrumb-item active">Registered camps</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row">
        <div class="col-lg-6">

          <div class="card">
          <div class="card-body">
    

    <?php
    // Start a session if not already started
   

    if (isset($_SESSION['uname'])) {
        $username = $_SESSION['uname'];

        $servername = "localhost";
        $usernameDB = "root";
        $passwordDB = "";
        $database = "ncc";

        // Create a database connection
        $conn = new mysqli($servername, $usernameDB, $passwordDB, $database);

        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        $sql = "SELECT Registration_number FROM enroll WHERE regimental_number = '$username'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            // If a record is found, fetch and store the Registration_number
            $row = $result->fetch_assoc();
            $registrationNumber = $row['Registration_number'];

            // Now, $registrationNumber contains the Registration_number based on the session username
            // echo "Registration Number: " . $registrationNumber;
        }
        // Query to fetch campid, campname, and certificate status based on Registration_number
        $sql = "SELECT r.campid, c.name,r.registerid
                FROM camps c
                JOIN register r ON c.campid = r.campid
                WHERE r.regno = '$registrationNumber' AND r.status='yes'";

        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            echo "<form action='upload_certificate.php' method='post' enctype='multipart/form-data'>";
            echo "<table border='1' style='width: 100%; border-collapse: collapse;'>";
            echo "<tr style='background-color: #f2f2f2;'><th>Serial No.</th><th>Camp ID</th><th>Camp Name</th><th>Upload/Download Certificate</th></tr>";
            $serialNumber = 1;
            $alternateColor = false;
            // Output data of each row
            while ($row = $result->fetch_assoc()) {
                $rowColor = $alternateColor ? '#cceeff' : '#99ccff';
                $alternateColor = !$alternateColor;
                // Display campid, campname, and handle upload or download based on certificate status
                $campid = $row['campid'];
                $registerid=$row['registerid'];
                $certificateExists = false;
                $checkCertificateQuery = "SELECT certificate FROM camp_certificate WHERE registerid='$registerid'";
                $certificateResult = $conn->query($checkCertificateQuery);
                if ($certificateResult->num_rows > 0) {
                    $certificateExists = true;
                }
                echo "<tr style='background-color: $rowColor;'>";
                echo "<td>".$serialNumber."</td>";
                echo "<td>".$campid."</td>";
                echo "<td>".$row['name']."</td>";
                echo "<td>";
                if (!$certificateExists) {
                    echo "<input type='hidden' name='registerid' value='$registerid'>";
                    echo "<a href='upload_certificate.php?registerid=$registerid' style='text-decoration: none; color: blue;'>Upload Certificate</a>";
                } else {
                    // If a certificate exists, display a link to download it
                    echo "<a href='download_certificate.php?registerid=$registerid' download style='text-decoration: none; color: green;'>Download Certificate</a>";
                }

                echo "</td></tr>";
                $serialNumber++;
            }

            // Close the table and form
            echo "</table>";
            echo "</form>";

        } else {
            // If no record is found for the session username
            echo "No records found for the given username.";
        }

        // Close the database connection
        $conn->close();
    } else {
        echo "Session error: 'uname' not set in the session.";
    }
    ?>

</div>

          </div>

        </div>

      </div>
      <div id="password-form" class="modal" style="display:none;">
    <div class="modal-content">
        <span class="close" onclick="closePasswordForm()">&times;</span>
        <form method="post" action="">
            <label for="new_password">New Password:</label>
            <input type="password" name="new_password" required><br>
            <br>
            <label for="confirm_new_password">Confirm New Password:</label>
            <input  type="password" name="confirm_new_password" required><br>
            <br>
            <input  type="submit" class="update_password" name="update_password" value="Save Password">
        </form>
    </div>
</div>
    </section>

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer" class="footer">
    <div class="copyright">
      &copy; Copyright <strong><span>NiceAdmin</span></strong>. All Rights Reserved
    </div>
    <div class="credits">
      <!-- All the links in the footer should remain intact. -->
      <!-- You can delete the links only if you purchased the pro version. -->
      <!-- Licensing information: https://bootstrapmade.com/license/ -->
      <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/ -->
      Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
    </div>
  </footer><!-- End Footer -->

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
  <script>
  document.getElementById("update-password-button").addEventListener("click", function() {
    showPasswordForm();
});

// Function to display the password form dialog
function showPasswordForm() {
    var modal = document.getElementById("password-form");
    modal.style.display = "block";
}

// Function to close the password form dialog
function closePasswordForm() {
    var modal = document.getElementById("password-form");
    modal.style.display = "none";
}
  </script>
</body>

</html>
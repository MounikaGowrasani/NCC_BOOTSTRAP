<?php
require('C:/xampp/htdocs/NCC_BOOTSTRAP/NCC_LOGIN/dbcon.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Dashboard - NiceAdmin Bootstrap Template</title>
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
  <style>

        /* Style the modal */
        .modal {
    display: none;
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-color: rgba(0, 0, 0, 0.7);
}

/* Style the modal content */
.modal-content {
    background-color: #fff;
    padding: 20px;
    width: 500px;
    margin: 15% auto;
    border: 1px solid #333;
    border-radius: 5px;
    position: relative;
}

/* Style the close button */
.close {
    position: absolute;
    top: 0;
    right: 0;
    padding: 5px 10px;
    cursor: pointer;
}

.close:hover {
    color: #f00;
}



    </style>
</head>

<body>
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


    if (isset($_POST['update_password'])) {
        // Handle password update here
        $newPassword = $_POST['new_password'];
        $confirmNewPassword = $_POST['confirm_new_password'];
        if ($newPassword === $confirmNewPassword) {
           
    
            // Check for a successful connection
            if ($conn->connect_error) {
                die("Connection failed: " . $connection->connect_error);
            }
    
            // Update the password in the database
            $updateQuery = "UPDATE logins SET passwords = '$newPassword' WHERE username = '$username'";
            if ($conn->query($updateQuery) === TRUE) {
                echo "<script>alert('Password updated successfully.');</script>";
            } else {
                echo "Error updating password: " . $connection->error;
            }
    
            // Close the database connection
            $conn->close();
        } else {
         
            echo "<script>alert('New password and confirmation do not match.');</script>";
        }
    }
?>
  <!-- ======= Header ======= -->
  <header id="header" class="header fixed-top d-flex align-items-center">

    <div class="d-flex align-items-center justify-content-between">
    <i class="bi bi-list toggle-sidebar-btn"></i>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
      <a href="index.php" class="logo d-flex align-items-center">
        <img src="assets/img/ncclogo-removebg-preview.png" alt="">
        <span class="d-none d-lg-block">Cadet</span>
      </a>
  
    </div><!-- End Logo -->

    

    <nav class="header-nav ms-auto">
      <ul class="d-flex align-items-center">


        <li class="nav-item dropdown">

          <a class="nav-link nav-icon" href="#" >
          <span class="d-none d-lg-block" style="border-bottom: 2px solid #00AEEF;  border-top: 2px solid #EF1C25;"><h5 style="margin: 0;"><a href="\NCC_BOOTSTRAP\ncc\h.html">Home</a></h5></span>
           
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
      <a href="index.php" class="logo d-flex align-items-center">

        
        
      </a>
     
    </div>
  
    <li class="nav-heading">Dashboard</li>

      <li class="nav-item">
        <a class="nav-link collapsed" href="view_schedule.php">
          <i class="bi bi-calendar-event"></i>
          <span> View Schedule</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link collapsed" href="eventss.php">
          <i class="bi bi-menu-button-wide"></i>
          <span>View Events</span>
        </a>
      </li>
  


      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#components-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-journal-text"></i><span>Camps</span><i class="bi bi-chevron-down ms-auto"></i>
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

        
        <li class="nav-item">
        <a class="nav-link collapsed" href="training_materials.php">
          <i class="bi bi-book"></i>
          <span>Training Material</span>
        </a>
      </li>
      

      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#icons-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-gem"></i><span>Cadet Achievements</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="icons-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="cadet_achievementss.php">
              <i class="bi bi-circle"></i><span>Upload Achievements</span>
            </a>
          </li>
          <li>
            <a href="retrieve_achievee.php">
              <i class="bi bi-circle"></i><span>View Achievements</span>
            </a>
          </li>
          
        </ul>
      </li><!-- End Icons Nav -->
      
     
      <li class="nav-item">
        <a class="nav-link collapsed" href="feedback.php">
          <i class="bi bi-chat-text"></i>
          <span>Feedback</span>
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#forms-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-lightbulb"></i><span>About NCC</span><i class="bi bi-chevron-down ms-auto"></i>
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
          <span>F A Q's</span>
        </a>
      </li><!-- End View Feedback Page Nav -->

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
      <h1>Dashboard</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.php">Home</a></li>
          <li class="breadcrumb-item active">Dashboard</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->
<!-- Reports -->
<div class="col-12">
              <div class="card">
                <div class="card-body">
                  <center><img src="assets/img/10.jpeg" alt="" style="width:100%;height:70vh;"></center>
                </div>

              </div>
            </div><!-- End Reports -->
    <section class="section dashboard">
      <div class="row">

        <!-- Left side columns -->
        <div class="col-lg-8">
          <div class="row">

           

           

            

            

            

           
          </div>
        </div><!-- End Left side columns -->

       


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
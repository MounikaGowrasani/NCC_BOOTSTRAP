<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Tables / Data - NiceAdmin Bootstrap Template</title>
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
      <a href="index.php" class="logo d-flex align-items-center">
      
        <span class="d-none d-lg-block">NCCAdmin</span>
      </a>
      <i class="bi bi-list toggle-sidebar-btn"></i>
    </div><!-- End Logo -->


    <nav class="header-nav ms-auto">
      <ul class="d-flex align-items-center">

        <li class="nav-item dropdown pe-3">

          <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
            <img src="assets/img/profile-img.jpg" alt="Profile" class="rounded-circle">
            <span class="d-none d-md-block dropdown-toggle ps-2">K. Anderson</span>
          </a><!-- End Profile Iamge Icon -->

          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
            <li class="dropdown-header">
              <h6>Kevin Anderson</h6>
              <span>Web Designer</span>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <a class="dropdown-item d-flex align-items-center" href="users-profile.php">
                <i class="bi bi-person"></i>
                <span>My Profile</span>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <a class="dropdown-item d-flex align-items-center" href="users-profile.php">
                <i class="bi bi-gear"></i>
                <span>Account Settings</span>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <a class="dropdown-item d-flex align-items-center" href="pages-faq.php">
                <i class="bi bi-question-circle"></i>
                <span>Need Help?</span>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <a class="dropdown-item d-flex align-items-center" href="#">
                <i class="bi bi-box-arrow-right"></i>
                <span>Sign Out</span>
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
    <a class="nav-link collapsed" href="uploadschedule.php">
      <i class="bi bi-person"></i>
      <span>Schedule</span>
    </a>
  </li>
  <li class="nav-item">
    <a class="nav-link collapsed" href="tables-data.php">
      <i class="bi bi-person"></i>
      <span>Enrolled Students</span>
    </a>
  </li>

  <li class="nav-item">
    <a class="nav-link collapsed" data-bs-target="#components-nav" data-bs-toggle="collapse" href="#">
      <i class="bi bi-menu-button-wide"></i><span>Events</span><i class="bi bi-chevron-down ms-auto"></i>
    </a>
    <ul id="components-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
      <li>
        <a href="components-alerts.php">
          <i class="bi bi-circle"></i><span>Add Events</span>
        </a>
      </li>
      
      <li>
        <a href="components-list-group.php">
          <i class="bi bi-circle"></i><span>View Events</span>
        </a>
      </li>
    </ul>
  </li><!-- End Components Nav -->

  <li class="nav-item">
    <a class="nav-link collapsed" data-bs-target="#forms-nav" data-bs-toggle="collapse" href="#">
      <i class="bi bi-journal-text"></i><span>Camps</span><i class="bi bi-chevron-down ms-auto"></i>
    </a>
    <ul id="forms-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
      <li>
        <a href="forms-elements.php">
          <i class="bi bi-circle"></i><span>Add Camps</span>
        </a>
      </li>
      <li>
        <a href="forms-layouts.php">
          <i class="bi bi-circle"></i><span>View Camps</span>
        </a>
      </li>
      <li>
        <a href="components-tooltips.php">
          <i class="bi bi-circle"></i><span>Registered students for camps</span>
        </a>
      </li>
      <li>
        <a href="tables-data.php">
          <i class="bi bi-circle"></i><span>Finalized students for camps</span>
        </a>
      </li>
    </ul>
  </li><!-- End Forms Nav -->
  <li class="nav-item">
    <a class="nav-link collapsed" href="pages-faq.php">
      <i class="bi bi-question-circle"></i>
      <span>F.A.Q</span>
    </a>
  </li><!-- End F.A.Q Page Nav -->
</ul>

  </aside><!-- End Sidebar-->

  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Data Tables</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.php">Home</a></li>
          <li class="breadcrumb-item">Tables</li>
          <li class="breadcrumb-item active">Data</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
   
              <h5 class="card-title">10(A) Enrolled students</h5>

              <!-- Table with stripped rows -->
              <?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "ncc";

// Create a connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM enroll where ncc_unit_enrolled='65-G,10(A)GBN NCC,Guntur' OR ncc_unit_enrolled='10A'";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<html>";
echo "<head>";
echo "<style>
body {
    font-family: Arial, sans-serif;
    background-color: #f5f5f5; /* Light gray background */
}

.table-container {
    overflow-x: auto;
    margin: 20px;
    background-color: #fff; /* White background for the table */
    border-radius: 10px; /* Rounded corners for the table container */
    box-shadow: 0 0 20px rgba(0, 0, 0, 0.1); /* Subtle shadow effect */
}

table {
    width: 100%;
    border-collapse: collapse;
}

th, td {
    padding: 12px;
    text-align: left;
    border-bottom: 1px solid #ddd;
}

th {
    background-color: FF9546; /* Orange background for table headers */
    color: black;
}

.regimental-number {
    width: 80px;
}

.button-container {
    display: flex;
    justify-content: space-around;
    margin-top: 20px;
}

.export-button {
    background-color: #3498db; /* Blue background for export buttons */
    color: white;
    border: none;
    padding: 10px 20px;
    cursor: pointer;
    transition: background-color 0.3s ease;
    border-radius: 5px; /* Rounded corners for buttons */
}

.export-button:hover {
    background-color: #2980b9; /* Darker blue shade on hover */
}

   
</style>";
echo "</head>";
echo "<body>";
    echo "<table border=><tr><th>ID</th>
    <th>stu_name</th>
    <th>pno</th>
    <th>Email</th>
    <th>Gender</th>
    <th>Registration_number</th>
    <th>photo</th>
    <th>Name_of_school</th> 
    <th>Stream</th>
    <th>PAN_card_no</th>
    <th>Marks memos</th>
    <th>Aadhar_number</th>
    <th>Date__of__birth </th>
    <th>father_name </th>
    <th>mother_name </th>
    <th>nationality </th>
    <th>bank_name </th>
    <th>account_no </th>
    <th>ifsc_code </th>
    <th>edu_qualification </th>
    <th>marks </th>
    <th>com_address</th> 
    <th>com_pincode</th>
    <th>identification_mark1 </th>
    <th>identification_mark2 </th>
    <th>blood_group</th> 
    <th>place </th>
    <th>Date</th>
    <th>Regimental_number</th>
    </tr>";
    $id=1;
    $alternateColor = false;
    while ($row = $result->fetch_assoc()) {
        $rowColor = $alternateColor ? '#FFB476' : '#FFF7E8'; 
        echo "<tr style='background-color: " . $rowColor . ";'><td>" . $id . "</td><td>" . $row["stu_name"] . "</td><td>" . $row["pno"] ."</td><td>" . $row["Email"] . "</td><td>" . $row["Gender"] ."</td><td>" . $row["Registration_number"] . "</td><td>";

        if (isset($row["photo_data"])) {
            // Assuming the "photo_data" column contains the image data
            // Display the image using an <img> tag
            echo "<img src='data:image/png;base64," . base64_encode($row["photo_data"]) . "' alt='Student Photo' width='100'>";
        } else {
            echo "No photo available";
        }

        echo "</td><td>" . $row["Name_of_school"] . "</td><td>" . $row["Stream"] ."</td><td>" . $row["PAN_crad"] . "</td><td>";


        if (!empty($row["file_data"])) {
            $pdfData = $row["file_data"];
            $pdfDataEncoded = base64_encode($pdfData);
            $rno=$row['Registration_number'];
            // Create a unique filename for the downloaded PDF (optional)
            $filename = " " . $rno . ".pdf";

            // Display the link to download the PDF
            echo "<a href='data:application/pdf;base64,$pdfDataEncoded' download='$filename'>$filename</a>";
        } else {
            // Display "File not available" when file_data is empty
            echo "File not available";
        }

        // Continue displaying other columns

        echo "</td><td>". $row["Aadhar_number"] ."</td><td>" . $row["Date__of__birth"] . "</td><td >" . $row["father_name"] ."</td><td>" . $row["mother_name"] . "</td><td>" . $row["nationality"] ."</td><td>" . $row["bank_name"] . "</td><td>" . $row["account_no"] ."</td><td>" . $row["ifsc_code"] . "</td><td>" . $row["edu_qualification"] ."</td><td>" . $row["marks"] . "</td><td>" . $row["com_address"] ."</td><td>" . $row["com_pincode"] . "</td><td>" . $row["identification_mark1"] ."</td><td>".$row["identification_mark2"] . "</td><td>" . $row["blood_group"]."</td><td>".$row["place"] . "</td><td>" . $row["Datee"];
        echo "</td><td>";
        if ($row["regimental_number_updated"]==NULL) {
            // Display an input field to update regimental_number
            echo "<form method='POST' action='update_regimental_number.php'>
            <input type='hidden' name='student_id' value='" . $row['Registration_number'] . "'>
            <input type='text' class='editable regimental-number' name='new_regimental_number' data-column='regimental_number' value='" . $row["regimental_number"] . "'>
            <input type='submit' name='submit' value='Update Regimental Number'>
        </form>";
        } else {
            // Display the existing regimental_number as plain text
            echo $row["regimental_number"];
        }
        echo "</td></tr>";
        $alternateColor = !$alternateColor;
        $id=$id+1;
    }
    echo "</table>";
} else {
    echo "No results found";
}
echo "<div class='button-container'>";
echo "<button class='export-button' onclick='exportToExcel()'>Export to Excel</button>";
echo "<button class='export-button' id='exportBu' onclick='exportToWord()'>Export to Word</button>";
echo "</div>";


$conn->close();
?>
<script>
function exportToExcel() {
        
        window.location.href = '/NCC_BOOTSTRAP/NCC_ADMIN/export.php';
        }
        
    function exportToWord(){
        
        window.location.href = '/NCC_BOOTSTRAP/NCC_ADMIN/exportw.php';
        }

        
</script>
              <!-- End Table with stripped rows -->

           
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

</body>

</html>
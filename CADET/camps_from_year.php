<?php require_once('dbcon.php');
?>
// upload.php
<?php
// Check if the 'year' parameter is set and not empty
if (isset($_GET['year']) && !empty($_GET['year'])) {
  // Assuming you have a MySQL database connection established

  // Sanitize the input to prevent SQL injection
  $selectedYear = mysqli_real_escape_string($conn, $_GET['year']);

  // Perform a database query to fetch camps based on the selected year
   
   $query = "SELECT * FROM camps WHERE SUBSTRING(campid, -4) = '$selectedYear'";

  $result = mysqli_query($conn, $query);

  if ($result) {
    if ($result->num_rows > 0) {
    // Construct options for the dropdown based on the fetched camps
    $options = '';
    while ($row = mysqli_fetch_assoc($result)) {
      $campName = $row['name']; // Assuming the column name for camp name
      $options .= "<option value='$campName'>$campName</option>";
    }
    echo $options;
}
else{
    echo "<option value=''>No camps available</option>";
}
  } else {
    // Handle query error
    echo "Error executing query: " . mysqli_error($conn);
  }

} else {
  // Return an error message if 'year' parameter is missing or empty
  echo "Year parameter is missing or empty";
}
?>

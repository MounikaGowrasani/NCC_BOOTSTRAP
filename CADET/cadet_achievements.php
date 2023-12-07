<!DOCTYPE html>
<html>
<head>
  <title>Cadet Page</title>
  <link rel="stylesheet" type="text/css" href="styles.css">
  <script>
      function validateFiles() {
      var photoInput = document.getElementById('photo');
      var certificateInput = document.getElementById('certificate');

      var allowedExtensions = /(\.jpg|\.jpeg|\.png)$/i;

      if (!allowedExtensions.exec(photoInput.value)) {
        alert('Please upload an image file for photo (jpeg, jpg, or png)');
        return false;
      }

      if (!allowedExtensions.exec(certificateInput.value)) {
        alert('Please upload an image file for certificate (jpeg, jpg, or png)');
        return false;
      }

    
  </script>
</head>
<body>
  <form action="upload_achieve.php" method="post" enctype="multipart/form-data" onsubmit="return validateFiles()">
    <label for="year">Select Year:</label>
    <select name="year" id="year" onchange="fetchCamps()">
      <!-- Populate with 2 previous years and 2 future years -->
      <?php
        $currentYear = date("Y");
        for ($i = $currentYear - 2; $i <= $currentYear + 2; $i++) {
          echo "<option value='$i'>$i</option>";
        }
      ?>
    </select><br><br>

    

    <label for="photo">Upload Photo:</label>
    <input type="file" name="photo" id="photo"  accept=".jpeg, .jpg, .png"><br><br>

    <label for="certificate">Upload Certificate:</label>
    <input type="file" name="certificate" id="certificate"  accept=".jpeg, .jpg, .png"><br><br>

    <label for="description">Description:</label><br>
    <textarea name="description" id="description" rows="4" cols="50"></textarea><br><br>

    <input type="submit" value="Submit">
  </form>
</body>
</html>

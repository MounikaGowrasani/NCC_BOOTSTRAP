<?php require('dbcon.php');
?>
<?php include('session.php');
?>
<?php
$regimentalNumber=$_SESSION['uname'];
// Get form data
$year = $_POST['year'];
$description = $_POST['description'];

$regimentalNumber = $_SESSION['uname'];

// Create folder structure
$uploadDir = 'cadet_achievements/' . $year . '/';
if (!is_dir($uploadDir)) {
    mkdir($uploadDir, 0777, true); // Create year folder if not exist
}

$regimentalDir = $uploadDir . $regimentalNumber . '/';
if (!is_dir($regimentalDir)) {
    mkdir($regimentalDir, 0777, true); // Create regimental number folder if not exist
}


$sql = "SELECT MAX(achieve_no) AS max_achieve_no FROM cadet_achievements WHERE regimental_number= '$regimentalNumber'";
$result = $conn->query($sql);

if ($result && $row = $result->fetch_assoc()) {
    $achieveNo = $row['max_achieve_no'] + 1; // Increment achieve_no
} else {
    $achieveNo = 1; // Set achieve_no to 1 if no previous entries for the regimental number
}



// File upload and database insertion
$photoFile = $regimentalDir . 'photo_' . $achieveNo . '.' . pathinfo($_FILES['photo']['name'], PATHINFO_EXTENSION);
$certificateFile = $regimentalDir . 'certificate_' . $achieveNo . '.' . pathinfo($_FILES['certificate']['name'], PATHINFO_EXTENSION);

if (move_uploaded_file($_FILES['photo']['tmp_name'], $photoFile) && move_uploaded_file($_FILES['certificate']['tmp_name'], $certificateFile)) {

   

    $sqlInsert = "INSERT INTO cadet_achievements (year, regimental_number, achieve_no, photo_path, certificate_path, description)
            VALUES ('$year', '$regimentalNumber', '$achieveNo', '$photoFile', '$certificateFile', '$description')";

    if ($conn->query($sqlInsert) === TRUE) {
        echo "Records inserted successfully.";
    } else {
        echo "Error: " . $sqlInsert . "<br>" . $conn->error;
    }

    $conn->close();
} else {
    // File upload failed
    echo "File upload failed.";
}
?>

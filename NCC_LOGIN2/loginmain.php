
<?php
session_start();
require('dbcon.php');
$error="";
if (isset($_POST['submit'])) {
    $u = $_POST['uname'];
    $p = $_POST['pass'];
    $userType = $_POST['userType'];
    $usernameLength = strlen($u);

    // Validate username based on user type
    if (($userType == 'admin' && $u != 'admin') || (($userType == 'ano') && !in_array($u, ['ano1', 'ano2'])) || ($userType == 'cadet' && strpos($u, '2') !== 0)) {
      $error="Invalid userType";            
    }
    elseif($userType == 'cadet' && $usernameLength!=13)
    {
      $error="Invalid Username";    
    }
else
{
    // Hash the password for better security
    $hashedPassword = password_hash($p, PASSWORD_DEFAULT);

    $sql = "SELECT * FROM logins WHERE username='$u' AND passwords='$p'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Username and password are correct
        $row = $result->fetch_assoc();
        $y = $row['type'];

        $_SESSION['uname'] = $u;

        if ($y == 'admin') {
          header('location: /NCC_BOOTSTRAP/NCC_ADMIN/index.php');
      } elseif ($y == 'ano1') {
          header('location: /NCC_BOOTSTRAP/Ncc_ano1/index.php');
      } elseif ($y == 'ano2') {
          header('location: /NCC_BOOTSTRAP/Ncc_ano2/index.php');
      } elseif ($y == 'cadet') {
          header('location: /NCC_BOOTSTRAP/CADET/index.php');
      }
    } else {
      $error="Invalid Credentials"; 
    }
}
}
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>Login Form </title> 
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css"/>
  </head>
  <body>
    <div class="container">
      <div class="wrapper">
      <div class="title"><span id="errorText">LOGIN FORM</span></div>

<!-- Display error message in red color -->
<div id="errorMessage" style="color: red; text-align:center; margin-top:5px;"><?php echo $error; ?></div>
        <form action="loginmain.php" method="post">
         
         <div class="row">
            <i class="fas fa-user"></i>
            <input type="text"  name="uname" id="uname" placeholder="Username" required>
          </div>
          <div class="row">
            <i class="fas fa-lock"></i>
            <input type="password"  name="pass" id="pass" placeholder="Password" required>
          </div>
          <div class="row">
            <i class="fas fa-users"></i>
          <select id="userType" name="userType" required>
            <option value="cadet">Cadet</option>
            <option value="ano">ANO</option>
            <option value="admin">Admin</option>
          </select>
        </div>

          <div class="row button">
            <input type="submit" value="Login" name="submit">
          </div>
          <div class="signup-link">Not a member? <a href="/NCC_BOOTSTRAP/NCC_ENROLL/enroll.html">Enroll Here</a></div>
        </form>
      </div>
    </div>

  </body>
</html>
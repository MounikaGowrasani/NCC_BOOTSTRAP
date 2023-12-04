<?php
session_start();
require('dbcon.php');

if (isset($_POST['submit'])) {
    $u = $_POST['uname'];
    $p = $_POST['pass'];
    $userType = $_POST['userType'];
    $usernameLength = strlen($u);
    // Validate username based on user type
    if (($userType == 'admin' && $u != 'admin') || (($userType == 'ano') && !in_array($u, ['ano1', 'ano2']))||($userType == 'cadet' && strpos($u, '2') !== 0)) {
        echo '<script type="text/javascript">alert("Invalid username for the selected user type. Please try again.");</script>';
        echo '<script type="text/javascript">window.location.href="/NCC_MAIN/NCC_LOGIN/loginmain.php";</script>';
        
        exit; // Stop further processing
    }
    if($userType == 'cadet' && $usernameLength!=13)
    {
        echo '<script type="text/javascript">alert("Invalid username. Please try again.");</script>';
        echo '<script type="text/javascript">window.location.href="/NCC_MAIN/NCC_LOGIN/loginmain.php";</script>';
        exit;
    }

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
        echo '<script type="text/javascript">alert("Invalid username or password. Please try again.");</script>';
        echo '<script type="text/javascript">window.location.href="/NCC_MAIN/NCC_LOGIN/loginmain.php";</script>';
    }
}
?>

<?php
session_start();
// Destroy the session to log out the user
session_destroy();

// Send a response
echo "<script>alert('Logged out successfully');</script>";
header("refresh:1;url=/NCC_BOOTSTRAP/NCC_LOGIN2/loginmain.php");
?>

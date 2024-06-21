<?php
session_start();
session_destroy();
header("Location: signin.php"); // Redirect to login page or home page
exit();
?>

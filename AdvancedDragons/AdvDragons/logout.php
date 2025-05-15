<?php
session_start();
session_unset(); // Remove session variables
session_destroy(); // Destroy session
header("Location: main.php"); // Redirect to home page
exit();
?>
<?php
session_start(); // Start the session
session_unset(); // Remove all session variables
session_destroy(); // Destroy the session
header("Location: /~s2264629/AdvancedWebScripting/public/index.php"); // Redirect to homepage
exit();
?>

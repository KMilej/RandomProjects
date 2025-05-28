<?php
session_start();
session_unset(); // Remove session variables
session_destroy(); // Destroy session
header("Location: /~s2264629/AdvancedWebScripting/public/index.php");
exit();
?>
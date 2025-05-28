<?php
define('SERVER', 'localhost');
define('USERNAME', 's2264629');
define('PASSWORD', 'QfO3spxx');
define('DBNAME', 's2264629_AdvancedWebScripting');
define('BASE_URL', 'http://olly.fifecomptech.net/~s2264629/AdvancedWebScripting/');

try {
    // Create PDO database connection
    $dbConnect = new PDO(
        "mysql:host=" . SERVER . ";dbname=" . DBNAME . ";charset=utf8",
        USERNAME,
        PASSWORD
    );
    // Set error mode to exception for better debugging
    $dbConnect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    // Display error message if connection fails
    die("Error connecting with DB: " . $e->getMessage());
}
?>

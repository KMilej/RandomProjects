<?php
/*
  HF5735 Web Development: Dynamically Generated Content 
  Author: Kamil Milej | Date: 30.05.2025 
  Version: 1.0
*/

session_start(); // Start session to track user login

require 'config.php'; // Connect to the database

if ($_SERVER["REQUEST_METHOD"] == "POST") { // Check if form was submitted
    $username = trim($_POST["username"]); // Get and trim username
    $password = trim($_POST["password"]); // Get and trim password

    if (!empty($username) && !empty($password)) { // Ensure fields are filled
        // Prepare query to find user in the database
        $stmt = $dbConnect->prepare("SELECT user_id, username, password, role FROM users WHERE username = ?");
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $stmt->store_result();

        if ($stmt->num_rows > 0) { // Check if user exists
            $stmt->bind_result($id, $db_username, $db_password, $role);
            $stmt->fetch();

            if (password_verify($password, $db_password)) { // Check password
                // Store user data in session
                $_SESSION["user_id"] = $id;
                $_SESSION["username"] = $db_username;
                $_SESSION["role"] = $role;

                echo "Login successful! Redirecting..."; // Debugging output
                echo "<pre>";
                print_r($_SESSION);
                echo "</pre>";

                header("Location: main.php"); // Redirect to main page
                exit();
            } else {
                header("Location: login.php?error=Incorrect password!"); // Wrong password
                exit();
            }
        } else {
            header("Location: login.php?error=User does not exist!"); // User not found
            exit();
        }
        $stmt->close();
    } else {
        header("Location: login.php?error=Please fill in all fields!"); // Empty fields
        exit();
    }
}
$dbConnect->close(); // Close database connection
?>

<?php
session_start(); // Start session
include('config.php'); // Connect to database

header('Content-Type: application/json'); // Set response type to JSON
error_reporting(E_ALL);
ini_set('display_errors', 1); // Enable error reporting

if ($_SERVER["REQUEST_METHOD"] === "POST") { // Check if request is POST
    $id = $_POST['id']; // Get user ID from request

    // ✅ Prepare SQL query to delete user
    $stmt = $dbConnect->prepare("DELETE FROM users WHERE user_id = ?");
    $stmt->bind_param("i", $id);

    if ($stmt->execute()) { // Check if deletion was successful
        echo json_encode(["status" => "success", "message" => "User deleted successfully"]);
    } else {
        echo json_encode(["status" => "error", "message" => "Error deleting user"]);
    }

    $stmt->close(); // Close statement
    $dbConnect->close(); // Close database connection
} else {
    echo json_encode(["status" => "error", "message" => "Invalid request"]); // Handle wrong request method
}
?>

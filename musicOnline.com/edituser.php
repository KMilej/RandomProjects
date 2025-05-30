<?php
session_start(); // Start session
include('config.php'); // Connect to database

header('Content-Type: application/json'); // Set response type to JSON
error_reporting(E_ALL);
ini_set('display_errors', 1); // Enable error reporting

if ($_SERVER["REQUEST_METHOD"] === "POST") { // Check if request is POST
    // ✅ Check if all required fields are provided
    if (!isset($_POST['id']) || !isset($_POST['username']) || !isset($_POST['email']) || !isset($_POST['role'])) {
        echo json_encode(["status" => "error", "message" => "Missing required fields"]);
        exit;
    }

    // ✅ Get data from request
    $id = $_POST['id'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $role = $_POST['role'];

    // ✅ Prepare SQL query to update user details
    $stmt = $dbConnect->prepare("UPDATE users SET username = ?, email = ?, role = ? WHERE user_id = ?");
    $stmt->bind_param("sssi", $username, $email, $role, $id);

    if ($stmt->execute()) { // Check if update was successful
        echo json_encode(["status" => "success", "message" => "User updated successfully"]);
    } else {
        echo json_encode(["status" => "error", "message" => "Error updating user"]);
    }

    $stmt->close(); // Close statement
    $dbConnect->close(); // Close database connection
} else {
    echo json_encode(["status" => "error", "message" => "Invalid request"]); // Handle wrong request method
}
?>

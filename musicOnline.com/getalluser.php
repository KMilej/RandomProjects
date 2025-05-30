<?php
session_start(); // Start session
include('config.php'); // Connect to database

header('Content-Type: application/json'); // Set response type to JSON
error_reporting(E_ALL);
ini_set('display_errors', 1); // Enable error reporting

// ✅ Get all users including new fields
$sql = "SELECT user_id, username, email, role, created_at, first_name, last_name, address FROM users";
$result = $dbConnect->query($sql);

$users = [];
while ($row = $result->fetch_assoc()) {
    $users[] = $row; // Add user data to array
}

// ✅ Return all users as JSON
echo json_encode($users, JSON_PRETTY_PRINT);
?>

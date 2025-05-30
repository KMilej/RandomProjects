<?php
session_start(); // Start session
include('config.php'); // Connect to database

header('Content-Type: application/json'); // Set response type to JSON
error_reporting(E_ALL);
ini_set('display_errors', 1); // Enable error reporting

//  Check if user is logged in
if (!isset($_SESSION['username'])) {
    echo json_encode(["message" => "❌ You must be logged in!"]);
    exit;
}

$ownedby = $_SESSION['username']; // Get logged-in user's name

//  Get products owned by the logged-in user
$sql = "SELECT id, image, title, price, description, category FROM products WHERE ownedby = ?";
$stmt = $dbConnect->prepare($sql);
$stmt->bind_param("s", $ownedby);
$stmt->execute();
$result = $stmt->get_result();

$products = [];
while ($row = $result->fetch_assoc()) {
    $products[] = $row; // Add product data to array
}

//  Return products as JSON
echo json_encode($products);

$stmt->close(); // Close statement
?>

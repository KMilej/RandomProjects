<?php
session_start(); // Start session
include('config.php'); // Connect to database

header('Content-Type: application/json'); // Set response type to JSON
error_reporting(E_ALL);
ini_set('display_errors', 1); // Enable error reporting

// ✅ Get all products from the database
$sql = "SELECT id, image, title, price, description, category, ownedby FROM products";
$result = $dbConnect->query($sql);

$products = [];
while ($row = $result->fetch_assoc()) {
    // ✅ Ensure correct image path
    if (!str_starts_with($row['image'], "images/products/")) {
        $row['image'] = "images/products/" . $row['image'];
    }
    $products[] = $row; // Add product to array
}

// ✅ Return all products as JSON
echo json_encode($products);
?>

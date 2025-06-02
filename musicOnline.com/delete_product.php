<?php
/*
  HF5735 Web Development: Dynamically Generated Content 
  Author: Kamil Milej | Date: 30.05.2025 
  Version: 1.0
*/

header('Content-Type: application/json'); // ✅ Required for fetch().json()

session_start(); // Start session
include('config.php'); // Connect to database

// Check if user is logged in
if (!isset($_SESSION['username'])) {
    echo json_encode(["message" => " You must be logged in!"]);
    exit;
}

$id = $_POST['id'] ?? "";

// Get user role (default to "user")
$userRole = $_SESSION['role'] ?? "user";

// Select product to verify ownership and get image path
if ($userRole === "admin") {
    $sql = "SELECT image FROM products WHERE id = ?";
    $stmt = $dbConnect->prepare($sql);
    $stmt->bind_param("i", $id);
} else {
    $sql = "SELECT image FROM products WHERE id = ? AND ownedby = ?";
    $stmt = $dbConnect->prepare($sql);
    $stmt->bind_param("is", $id, $_SESSION['username']);
}

$stmt->execute();
$result = $stmt->get_result();
$product = $result->fetch_assoc();
$stmt->close();

if (!$product) {
    echo json_encode(["message" => " Product not found or unauthorized!"]);
    exit;
}

// Delete image file
$imagePath = __DIR__ . "/images/products/" . $product['image']; // ✅ safer path
if (file_exists($imagePath)) {
    unlink($imagePath);
}

// Delete product
if ($userRole === "admin") {
    $sql = "DELETE FROM products WHERE id = ?";
    $stmt = $dbConnect->prepare($sql);
    $stmt->bind_param("i", $id);
} else {
    $sql = "DELETE FROM products WHERE id = ? AND ownedby = ?";
    $stmt = $dbConnect->prepare($sql);
    $stmt->bind_param("is", $id, $_SESSION['username']);
}

if ($stmt->execute()) {
    echo json_encode(["message" => " Product deleted successfully!"]);
} else {
    echo json_encode(["message" => " Error deleting product!"]);
}

$stmt->close();
?>

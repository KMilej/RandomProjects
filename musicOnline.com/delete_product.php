<?php
session_start(); // Start session
include('config.php'); // Connect to database

// Check if user is logged in
if (!isset($_SESSION['username'])) {
    echo json_encode(["message" => "❌ You must be logged in!"]);
    exit;
}

$id = $_POST['id'] ?? ""; // Get product ID from request

// Get user role (default to "user")
$userRole = $_SESSION['role'] ?? "user";

if ($userRole === "admin") {
    // ✅ Admin can delete any product
    $sql = "SELECT image FROM products WHERE id = ?";
    $stmt = $dbConnect->prepare($sql);
    $stmt->bind_param("i", $id);
} else {
    // ✅ Regular user can only delete their own products
    $sql = "SELECT image FROM products WHERE id = ? AND ownedby = ?";
    $stmt = $dbConnect->prepare($sql);
    $stmt->bind_param("is", $id, $_SESSION['username']);
}

$stmt->execute();
$result = $stmt->get_result();
$product = $result->fetch_assoc();

if (!$product) { // Check if product exists
    echo json_encode(["message" => "❌ Product not found or unauthorized!"]);
    exit;
}

// ✅ Delete image file
$imagePath = __DIR__ . "/" . $product['image'];
if (file_exists($imagePath)) {
    unlink($imagePath);
}

// ✅ Delete product from database
if ($userRole === "admin") {
    $sql = "DELETE FROM products WHERE id = ?";
    $stmt = $dbConnect->prepare($sql);
    $stmt->bind_param("i", $id);
} else {
    $sql = "DELETE FROM products WHERE id = ? AND ownedby = ?";
    $stmt = $dbConnect->prepare($sql);
    $stmt->bind_param("is", $id, $_SESSION['username']);
}

if ($stmt->execute()) { // Check if deletion was successful
    echo json_encode(["message" => "✅ Product deleted successfully!"]);
} else {
    echo json_encode(["message" => "❌ Error deleting product!"]);
}

$stmt->close(); // Close statement
?>

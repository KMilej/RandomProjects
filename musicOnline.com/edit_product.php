<?php
session_start(); // Start session
include('config.php'); // Connect to database

// Check if user is logged in
if (!isset($_SESSION['username'])) {
    echo json_encode(["message" => "❌ You must be logged in!"]);
    exit;
}

// Get form data
$id = $_POST['id'] ?? "";
$title = $_POST['title'] ?? "";
$price = $_POST['price'] ?? "";
$description = $_POST['description'] ?? "";
$category = $_POST['category'] ?? "";

// Get user role (default to "user")
$userRole = $_SESSION['role'] ?? "user";

if ($userRole === "admin") {
    // ✅ Admin can edit any product
    $sql = "UPDATE products SET title=?, price=?, description=?, category=? WHERE id=?";
    $stmt = $dbConnect->prepare($sql);
    $stmt->bind_param("sdssi", $title, $price, $description, $category, $id);
} else {
    // ✅ Regular user can only edit their own products
    $sql = "UPDATE products SET title=?, price=?, description=?, category=? WHERE id=? AND ownedby=?";
    $stmt = $dbConnect->prepare($sql);
    $stmt->bind_param("sdssis", $title, $price, $description, $category, $id, $_SESSION['username']);
}

// Execute update query
if ($stmt->execute()) {
    echo json_encode(["message" => "✅ Product updated successfully!"]);
} else {
    echo json_encode(["message" => "❌ Error updating product!"]);
}

$stmt->close(); // Close statement
?>

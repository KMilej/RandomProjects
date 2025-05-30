<?php
session_start();
include('config.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    header('Content-Type: application/json');
    error_reporting(E_ALL);
    ini_set('display_errors', 1);

    if (!$dbConnect) {
        echo json_encode(["message" => "❌ Database connection failed."]);
        exit;
    }

    // Get form data
    $title = $_POST['title'] ?? "";
    $price = $_POST['price'] ?? "";
    $description = $_POST['description'] ?? "";
    $category = $_POST['category'] ?? "";
    $artist = $_POST['artist'] ?? ""; // ⬅️ NEW
    $ownedby = $_SESSION['username'] ?? "unknown";

    // Validate fields
    if (empty($title) || empty($price) || empty($description) || empty($category) || empty($artist)) {
        echo json_encode(["message" => "❌ All fields are required!"]);
        exit;
    }

    if (!is_numeric($price) || $price < 0) {
        echo json_encode(["message" => "❌ Price cannot be negative!"]);
        exit();
    }

    $uploadDir = __DIR__ . "/images/products/";
    if (!is_dir($uploadDir) && !mkdir($uploadDir, 0777, true)) {
        echo json_encode(["message" => "❌ Failed to create upload directory."]);
        exit;
    }

    if (!isset($_FILES['image']) || $_FILES['image']['error'] !== UPLOAD_ERR_OK) {
        echo json_encode(["message" => "❌ No image uploaded or upload error occurred."]);
        exit;
    }

    $imageName = basename($_FILES['image']['name']);
    $imagePath = $uploadDir . $imageName;
    $imageType = strtolower(pathinfo($imagePath, PATHINFO_EXTENSION));
    $allowedTypes = ['jpg', 'jpeg'];

    if (!in_array($imageType, $allowedTypes)) {
        echo json_encode(["message" => "❌ File format is invalid. Only JPG/JPEG images are allowed."]);
        exit;
    }

    if (!move_uploaded_file($_FILES['image']['tmp_name'], $imagePath)) {
        echo json_encode(["message" => "❌ Image upload failed."]);
        exit;
    }

    $dbImagePath = $imageName;

    // ✅ INSERT with artist
    $sql = "INSERT INTO products (image, title, price, description, category, artist, ownedby) 
            VALUES (?, ?, ?, ?, ?, ?, ?)";
    $stmt = $dbConnect->prepare($sql);
    $stmt->bind_param("ssdssss", $dbImagePath, $title, $price, $description, $category, $artist, $ownedby);

    if ($stmt->execute()) {
        echo json_encode([
            "message" => "✅ Product added successfully!",
            "image" => $dbImagePath,
            "title" => $title,
            "price" => $price,
            "description" => $description,
            "category" => $category,
            "artist" => $artist,
            "ownedby" => $ownedby
        ]);
    } else {
        echo json_encode(["message" => "❌ Database error: " . $stmt->error]);
    }

    $stmt->close();
    exit;
}
?>

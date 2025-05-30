<?php
session_start(); // Start session to track user

include('config.php'); // Connect to database

if ($_SERVER['REQUEST_METHOD'] == 'POST') { // Check if form was submitted
    header('Content-Type: application/json'); // Set response format to JSON

    if (!$dbConnect) { // Check database connection
        echo json_encode(["message" => "❌ Database connection failed."]);
        exit;
    }

    // Get form data (default to empty if not set)
    $artist = $_POST['artist'] ?? "";
    $title = $_POST['title'] ?? "";
    $price = $_POST['price'] ?? "";
    $description = $_POST['description'] ?? "";
    $category = $_POST['category'] ?? "";
    $ownedby = $_SESSION['username'] ?? "unknown"; // Set owner from session

    // Check if fields are empty
    if (empty($title) || empty($price) || empty($description) || empty($category)) {
        echo json_encode(["message" => "❌ All fields are required!"]);
        exit;
    }

    // Validate price
    if (!is_numeric($price) || $price < 0) {
        echo json_encode(["message" => "❌ Price cannot be negative!"]);
        exit();
    }
    
    $uploadDir = __DIR__ . "/images/products/"; // Set image upload directory

    // Create directory if it doesn't exist
    if (!is_dir($uploadDir) && !mkdir($uploadDir, 0777, true)) {
        echo json_encode(["message" => "❌ Failed to create upload directory."]);
        exit;
    }

    // Check if an image was uploaded
    if (!isset($_FILES['image']) || $_FILES['image']['error'] !== UPLOAD_ERR_OK) {
        echo json_encode(["message" => "❌ No image uploaded or upload error occurred."]);
        exit;
    }

    // Validate image file type
    $imageName = basename($_FILES['image']['name']);
    $imagePath = $uploadDir . $imageName;
    $imageType = strtolower(pathinfo($imagePath, PATHINFO_EXTENSION)); 

    $allowedTypes = ['jpg', 'jpeg']; // Allowed file types

    if (!in_array($imageType, $allowedTypes)) {
        echo json_encode(["message" => "❌ File format is invalid. Only JPG/JPEG images are allowed."]);
        exit;
    }

    // Move uploaded file to target folder
    if (!move_uploaded_file($_FILES['image']['tmp_name'], $imagePath)) {
        echo json_encode(["message" => "❌ Image upload failed."]);
        exit;
    }

    $dbImagePath = $imageName; // Save image name for database

    // Insert product into database
    $sql = "INSERT INTO products (image, title, price, description, category, ownedby) 
            VALUES (?, ?, ?, ?, ?, ?)";
    $stmt = $dbConnect->prepare($sql);
    $stmt->bind_param("ssdsss", $dbImagePath, $title, $price, $description, $category, $ownedby);

    if ($stmt->execute()) { // Check if insert was successful
        echo json_encode([
            "message" => "✅ Product added successfully!",
            "image" => $dbImagePath,
            "title" => $title,
            "price" => $price,
            "description" => $description,
            "category" => $category,
            "ownedby" => $ownedby
        ]);
    } else {
        echo json_encode(["message" => "❌ Database error: " . $stmt->error]);
    }

    $stmt->close();
    exit;
}
?>

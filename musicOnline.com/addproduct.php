
<?php
/*
  HF5735 Web Development: Dynamically Generated Content 
  Author: Kamil Milej | Date: 30.05.2025 
  Version: 1.0
*/

session_start(); // Start session to access $_SESSION variables
include('config.php'); // Include DB config

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    header('Content-Type: application/json'); // Return response as JSON
    error_reporting(E_ALL);
    ini_set('display_errors', 1); // Show all errors (for debugging)

    if (!$dbConnect) {
        echo json_encode(["message" => " Database connection failed."]);
        exit;
    }

    // Get form data from POST
    $title = $_POST['title'] ?? "";
    $price = $_POST['price'] ?? "";
    $description = $_POST['description'] ?? "";
    $category = $_POST['category'] ?? "";
    $artist = $_POST['artist'] ?? ""; 
    $ownedby = $_SESSION['username'] ?? "unknown"; // Get username from session

    // Validate required fields
    if (empty($title) || empty($price) || empty($description) || empty($category) || empty($artist)) {
        echo json_encode(["message" => " All fields are required!"]);
        exit;
    }

    // Validate price
    if (!is_numeric($price) || $price < 0) {
        echo json_encode(["message" => " Price cannot be negative!"]);
        exit();
    }

    // Prepare upload directory
    $uploadDir = __DIR__ . "/images/products/";
    if (!is_dir($uploadDir) && !mkdir($uploadDir, 0777, true)) {
        echo json_encode(["message" => " Failed to create upload directory."]);
        exit;
    }

    // Check uploaded image
    if (!isset($_FILES['image']) || $_FILES['image']['error'] !== UPLOAD_ERR_OK) {
        echo json_encode(["message" => " No image uploaded or upload error occurred."]);
        exit;
    }

    // Validate image type
    $imageName = basename($_FILES['image']['name']);
    $imagePath = $uploadDir . $imageName;
    $imageType = strtolower(pathinfo($imagePath, PATHINFO_EXTENSION));
    $allowedTypes = ['jpg', 'jpeg'];

    if (!in_array($imageType, $allowedTypes)) {
        echo json_encode(["message" => " File format is invalid. Only JPG/JPEG images are allowed."]);
        exit;
    }

    // Move uploaded file
    if (!move_uploaded_file($_FILES['image']['tmp_name'], $imagePath)) {
        echo json_encode(["message" => " Image upload failed."]);
        exit;
    }

    $dbImagePath = $imageName; // Save image name for database

    // Insert data into products table
    $sql = "INSERT INTO products (image, title, price, description, category, artist, ownedby) 
            VALUES (?, ?, ?, ?, ?, ?, ?)";
    $stmt = $dbConnect->prepare($sql);
    $stmt->bind_param("ssdssss", $dbImagePath, $title, $price, $description, $category, $artist, $ownedby);

    if ($stmt->execute()) {
        echo json_encode([
            "message" => " Product added successfully!",
            "image" => $dbImagePath,
            "title" => $title,
            "price" => $price,
            "description" => $description,
            "category" => $category,
            "artist" => $artist,
            "ownedby" => $ownedby
        ]);
    } else {
        echo json_encode(["message" => " Database error: " . $stmt->error]);
    }

    $stmt->close();
    exit;
}
?>

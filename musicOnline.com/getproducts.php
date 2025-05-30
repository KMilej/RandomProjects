<?php
session_start();
include('config.php');

header('Content-Type: application/json');
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Sprawdzenie logowania
if (!isset($_SESSION['username'])) {
    echo json_encode(["message" => "❌ You must be logged in!"]);
    exit;
}

$ownedby = $_SESSION['username'];

$sql = "SELECT id, image, title, artist, price, description, category FROM products WHERE ownedby = ?";
$stmt = $dbConnect->prepare($sql);
$stmt->bind_param("s", $ownedby);
$stmt->execute();
$result = $stmt->get_result();

$products = [];
while ($row = $result->fetch_assoc()) {
    $products[] = $row;
}

echo json_encode($products);
$stmt->close();
?>

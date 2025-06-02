
<?php
/*
  HF5735 Web Development: Dynamically Generated Content 
  Author: Kamil Milej | Date: 30.05.2025 
  Version: 1.0
*/

session_start();
include('config.php');

header('Content-Type: application/json');
error_reporting(E_ALL);
ini_set('display_errors', 1);

$sql = "SELECT id, image, title, artist, price, description, category, ownedby FROM products";
$result = $dbConnect->query($sql);

$products = [];
while ($row = $result->fetch_assoc()) {
    // Fix image path if needed
    if (!str_starts_with($row['image'], "images/products/")) {
        $row['image'] = "images/products/" . $row['image'];
    }
    $products[] = $row;
}

echo json_encode($products);
?>

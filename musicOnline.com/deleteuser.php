<?php
session_start();
include('config.php');

header('Content-Type: application/json');
error_reporting(E_ALL);
ini_set('display_errors', 1);

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id'])) {
    $userId = intval($_POST['id']);

    // 1. Pobierz username tego użytkownika
    $getUsernameStmt = $dbConnect->prepare("SELECT username FROM users WHERE user_id = ?");
    $getUsernameStmt->bind_param("i", $userId);
    $getUsernameStmt->execute();
    $getUsernameStmt->bind_result($username);
    $getUsernameStmt->fetch();
    $getUsernameStmt->close();

    if (!$username) {
        echo json_encode(["success" => false, "message" => "User not found."]);
        exit;
    }

    // 2. Usuń produkty przypisane do username
    $deleteProductsStmt = $dbConnect->prepare("DELETE FROM products WHERE ownedby = ?");
    $deleteProductsStmt->bind_param("s", $username);
    $deleteProductsStmt->execute();
    $deleteProductsStmt->close();

    // 3. Usuń użytkownika
    $deleteUserStmt = $dbConnect->prepare("DELETE FROM users WHERE user_id = ?");
    $deleteUserStmt->bind_param("i", $userId);
    $deleteUserStmt->execute();

    if ($deleteUserStmt->affected_rows > 0) {
        echo json_encode(["success" => true, "message" => "User and their products deleted."]);
    } else {
        echo json_encode(["success" => false, "message" => "Failed to delete user."]);
    }

    $deleteUserStmt->close();
} else {
    echo json_encode(["success" => false, "message" => "Invalid request."]);
}

$dbConnect->close();
?>

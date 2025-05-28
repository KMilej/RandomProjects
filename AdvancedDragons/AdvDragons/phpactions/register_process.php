<?php
session_start();
require __DIR__ . '/../config/config.php';


$errors = [];

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $username = trim($_POST['username'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $password = $_POST['password'] ?? '';
    $confirmPassword = $_POST['confirm_password'] ?? '';
    $role = 'user';

    // Validation
    if (empty($username) || empty($email) || empty($password) || empty($confirmPassword)) {
        $errors[] = "All fields are required.";
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Invalid email address.";
    }

    if ($password !== $confirmPassword) {
        $errors[] = "Passwords do not match.";
    }

    if (strlen($password) < 8 || 
        !preg_match('/[A-Z]/', $password) || 
        !preg_match('/[a-z]/', $password) || 
        !preg_match('/[0-9]/', $password)) {
        $errors[] = "Password must be at least 8 characters long and contain a lowercase letter, an uppercase letter, and a number.";
    }

    // Check if username or email already exists
    $stmt = $dbConnect->prepare("SELECT user_id FROM Users WHERE username = ? OR email = ?");
    $stmt->execute([$username, $email]);
    if ($stmt->fetch()) {
        $errors[] = "A user with this username or email already exists.";
    }

    // Insert user into database
    if (empty($errors)) {
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        $stmt = $dbConnect->prepare("INSERT INTO Users (username, email, password, role) VALUES (?, ?, ?, ?)");
        $stmt->execute([$username, $email, $hashedPassword, $role]);

        $_SESSION['register_success'] = " Your account has been created. You can now log in.";
    } else {
        $_SESSION['register_errors'] = $errors;
    }

    header("Location: " . BASE_URL . "register.php");

    exit();
}
?>

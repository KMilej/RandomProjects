<?php
require 'config.php'; // Connect to the database

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Pobierz i wyczyść dane z formularza
    $username = trim($_POST["username"]);
    $email = trim($_POST["email"]);
    $password = trim($_POST["password"]);
    $confirm_password = trim($_POST["confirm_password"]);
    $first_name = trim($_POST["first_name"]);
    $last_name = trim($_POST["last_name"]);
    $address = trim($_POST["address"]);

    // Check if any field is empty
    if (empty($username) || empty($email) || empty($password) || empty($confirm_password)) {
        header("Location: register.php?error=Please fill in all fields!");
        exit();
    }

    // Validate username length (3-15 characters)
    if (strlen($username) < 3 || strlen($username) > 15) {
        header("Location: register.php?error=Username must be between 3 and 15 characters!");
        exit();
    }

    // Ensure username contains only letters
    if (!preg_match("/^[a-zA-Z]+$/", $username)) {
        header("Location: register.php?error=Username can only contain letters (no numbers or symbols)!");
        exit();
    }

    // Check if passwords match
    if ($password !== $confirm_password) {
        header("Location: register.php?error=Passwords do not match!");
        exit();
    }

    // Check if username or email already exists
    $stmt = $dbConnect->prepare("SELECT user_id FROM users WHERE username = ? OR email = ?");
    $stmt->bind_param("ss", $username, $email);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) { // If user exists, return an error
        header("Location: register.php?error=Username or email already taken!");
        exit();
    }
    $stmt->close();

    // Hash the password before storing it
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Insert new user into the database with default role 'user'
    $stmt = $dbConnect->prepare("
        INSERT INTO users (username, email, password, role, first_name, last_name, address, created_at)
        VALUES (?, ?, ?, 'user', ?, ?, ?, NOW())
    ");
    $stmt->bind_param("ssssss", $username, $email, $hashed_password, $first_name, $last_name, $address);

    if ($stmt->execute()) { // Check if registration was successful
        header("Location: register.php?success=Registration successful! You can now log in.");
        exit();
    } else {
        header("Location: register.php?error=Registration failed, please try again.");
        exit();
    }
    $stmt->close();
}
$dbConnect->close(); // Close database connection
?>

<?php
session_start();

require 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = trim($_POST["username"]);
    $password = trim($_POST["password"]);

    if (!empty($username) && !empty($password)) {
        //use placeholder ? to avoid SQL injection
        $stmt = $dbConnect->prepare("SELECT user_id, username, password, role FROM Users WHERE username = ?");
        $stmt->execute([$username]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

    
        // echo "<pre>";
        // print_r($user);
        // echo "</pre>";

        if ($user && password_verify($password, $user['password'])) {

            $_SESSION['user_id'] = $user['user_id'];
            $_SESSION['username'] = $user['username'];
            $_SESSION['role'] = $user['role'];

            header("Location: homepage.php"); //website which show after log in
            exit();
        } else {
            echo "wrong username or password";
        }
    } else {
        echo "Fill all window";
    }
}
?>

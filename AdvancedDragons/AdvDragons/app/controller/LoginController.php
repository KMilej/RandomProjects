<?php
// Include configuration and user model files
require_once __DIR__ . '/../../config/config.php';
require_once __DIR__ . '/../model/UserModel.php';

class LoginController
{
    // Display the login form
    public function showForm()
    {
        $pageTitle = "Login";
        include __DIR__ . '/../view/login.php';
    }

    // Handle login form submission
    public function handleLogin()
    {
        session_start(); // Start the session

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $username = trim($_POST["username"]);
            $password = trim($_POST["password"]);

            // Check if both fields are filled
            if (!empty($username) && !empty($password)) {
                $userModel = new UserModel($GLOBALS['dbConnect']);
                $user = $userModel->findByUsername($username);

                // Verify user credentials
                if ($user && password_verify($password, $user['password'])) {
                    // Save user data in session and redirect to homepage
                    $_SESSION['user_id'] = $user['user_id'];
                    $_SESSION['username'] = $user['username'];
                    $_SESSION['role'] = $user['role'];

                    header("Location: " . BASE_URL . "app/view/homepage.php");
                    exit();
                } else {
                    // Display error if login fails
                    $error = "Wrong username or password";
                    include __DIR__ . '/../view/login.php';
                }
            } else {
                // Display error if fields are empty
                $error = "Fill all fields";
                include __DIR__ . '/../view/login.php';
            }
        }
    }
}

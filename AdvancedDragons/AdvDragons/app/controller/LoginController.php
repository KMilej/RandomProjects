<?php
require_once __DIR__ . '/../../config/config.php';
require_once __DIR__ . '/../model/UserModel.php';

class LoginController
{
    public function showForm()
    {
        $pageTitle = "Login";
        include __DIR__ . '/../view/login.php';
    }

    public function handleLogin()
    {
        session_start();

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $username = trim($_POST["username"]);
            $password = trim($_POST["password"]);

            if (!empty($username) && !empty($password)) {
                $userModel = new UserModel($GLOBALS['dbConnect']);
                $user = $userModel->findByUsername($username);

                if ($user && password_verify($password, $user['password'])) {
                    $_SESSION['user_id'] = $user['user_id'];
                    $_SESSION['username'] = $user['username'];
                    $_SESSION['role'] = $user['role'];

                    header("Location: " . BASE_URL . "app/view/homepage.php");
                    exit();
                } else {
                    $error = "Wrong username or password";
                    include __DIR__ . '/../view/login.php';
                }
            } else {
                $error = "Fill all fields";
                include __DIR__ . '/../view/login.php';
            }
        }
    }
}

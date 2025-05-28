<?php
require_once '../config/config.php';

// Determine action (default is 'login')
$action = $_GET['action'] ?? 'login';

switch ($action) {
    case 'login':
        // Load LoginController
        require_once '../app/controller/LoginController.php';
        $controller = new LoginController();

        // Call appropriate method based on request type
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $controller->handleLogin(); // Handle form submission
        } else {
            $controller->showForm(); // Show login form
        }
        break;

}

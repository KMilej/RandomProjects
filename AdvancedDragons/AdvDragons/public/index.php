<?php
require_once '../config/config.php';

$action = $_GET['action'] ?? 'login';

switch ($action) {
    case 'login':
        require_once '../app/controller/LoginController.php';
        $controller = new LoginController();

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $controller->handleLogin();
        } else {
            $controller->showForm();
        }
        break;

    // inne akcje...
}

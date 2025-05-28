<?php
// 🔧 DEBUG: Enable error display (only during development!)
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// 🔐 Start session and load configuration
session_start();
require_once __DIR__ . '/../../../config/config.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $pageTitle; ?></title>

    <!-- Load Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Load JavaScript files -->
    <!-- <script src="<?= BASE_URL ?>public/assets/javascript/JavaScript.js" defer></script> -->
    <script src="<?= BASE_URL ?>public/assets/javascript/homepage.js" defer></script>
    <script src="<?= BASE_URL ?>public/assets/javascript/faq.js" defer></script>
    <script src="<?= BASE_URL ?>public/assets/javascript/topic.js" defer></script>
    <script src="<?= BASE_URL ?>public/assets/javascript/login.js" defer></script>

    <!-- Load CSS files -->
    <link rel="stylesheet" href="<?= BASE_URL ?>public/assets/css/faq.css">
    <link rel="stylesheet" href="<?= BASE_URL ?>public/assets/css/homepage.css">
    <link rel="stylesheet" href="<?= BASE_URL ?>public/assets/css/topicinfo.css">
</head>

<body class="min-h-screen font-sans text-gray-800">

    <!-- NAVBAR -->
    <div class="bg-[#232f3e] p-4">
        <ul class="flex overflow-x-auto space-x-5 text-sm">

            <?php if (isset($_SESSION["user_id"])): ?>
                <!-- Show menu if user is logged in -->
                <li><a href="<?= BASE_URL ?>app/view/homepage.php" class="text-white hover:underline">Home Page</a></li>
                <li><a href="<?= BASE_URL ?>app/view/topicinformation.php" class="text-white hover:underline">Topic Information</a></li>
                <li><a href="<?= BASE_URL ?>app/view/faq.php" class="text-white hover:underline">FAQ</a></li>
                <li class="text-pink-400">Welcome, <strong><?php echo htmlspecialchars($_SESSION["username"]); ?></strong></li>
                <li><a href="<?php echo BASE_URL; ?>app/controller/logoutController.php" class="text-white hover:underline">Logout</a></li>
                
            <?php else: ?>
                <!-- Show login/register options if user is not logged in -->
                <li><a href="<?php echo BASE_URL; ?>public/index.php" class="text-white hover:underline">Please Log in to access</a></li>
                <li><a href="<?php echo BASE_URL; ?>app/view/register.php" class="text-white hover:underline">Register</a></li>
            <?php endif; ?>    
        </ul>
    </div>

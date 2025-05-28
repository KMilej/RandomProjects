<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $pageTitle; ?></title>

    <!-- <script src="https://cdn.tailwindcss.com"></script> -->
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <?php
    session_start();
    require_once 'config.php';
    ?>
    <div class="navbar">
    <ul class="nav-menu">
        <li><a href="<?php echo BASE_URL; ?>main.php">New website</a></li>
        <li><a href="#">Comming Soon</a></li>
        <li><a href="#">randomNavi</a></li> 

        <?php if (isset($_SESSION["user_id"])): ?>
            <li class="nav-welcome">Welcome, <strong><?php echo htmlspecialchars($_SESSION["username"]); ?></strong></li>
            <li><a href="logout.php">Logout</a></li>
        <?php else: ?>
            <li><a href="#">Randomblock</a></li>
            <li><a href="register.php">Register</a></li>
        <?php endif; ?>    
    </ul>
    </div>

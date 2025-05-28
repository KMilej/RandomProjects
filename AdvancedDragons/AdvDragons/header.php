<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $pageTitle; ?></title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="javascript/JavaScript.js" defer></script>
    <link rel="stylesheet" href="css/faq.css">
    <link rel="stylesheet" href="css/homepage.css">
    <link rel="stylesheet" href="css/topicinfo.css">

</head>
<body class="min-h-screen font-sans text-gray-800">
    <?php
    session_start();
    require_once 'config.php';
    ?>

    <!-- NAVBAR -->
    <div class="bg-[#232f3e] p-4">
        <ul class="flex overflow-x-auto space-x-5 text-sm">

            <?php if (isset($_SESSION["user_id"])): ?>
                <li><a href="http://olly.fifecomptech.net/~s2264629/AdvancedWebScripting/homepage.php" class="text-white hover:underline">Home Page</a></li>
                <li><a href="http://olly.fifecomptech.net/~s2264629/AdvancedWebScripting/topicinformation.php" class="text-white hover:underline">Topic Information</a></li>
                <li><a href="http://olly.fifecomptech.net/~s2264629/AdvancedWebScripting/faq.php" class="text-white hover:underline">FAQ</a></li>
                <li class="text-pink-400">Welcome, <strong><?php echo htmlspecialchars($_SESSION["username"]); ?></strong></li>
                <li><a href="logout.php" class="text-white hover:underline">Logout</a></li>
                
            <?php else: ?>
                <li><a href="<?php echo BASE_URL; ?>main.php" class="text-white hover:underline">Please Log in to access</a></li>
                <li><a href="register.php" class="text-white hover:underline">Register</a></li>
            <?php endif; ?>    
        </ul>
    </div>
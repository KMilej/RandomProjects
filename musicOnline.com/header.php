<?php require "php/function.php" ?>
<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $pageTitle; ?></title>

    <link rel="stylesheet" href="css/style.css">
    <script src="javascript/JavaScript.js" defer></script> 

    <meta name="description" content="">
    <meta name="keywords" content="">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

</head>
<body>
<?php
session_start();
// Włączanie logowania błędów
ini_set('log_errors', 1);
ini_set('display_errors', 1); // Do testów – pokaże błędy na stronie
error_reporting(E_ALL);

// Ustawienie ścieżki logów na serwerze
ini_set('error_log', __DIR__ . '/error_log.txt');

// Sprawdzenie, czy logi działają – zapis testowego błędu
error_log("🚀 Test logowania błędów PHP!");
?>
<header>
        <div class="top-banner"> <img src="images/main/topimage.jpg" alt="Girl in a jacket"></div>
        <nav class="navigation">
            <a href="http://olly.fifecomptech.net/~s2264629/musicOnline.com/main.php">Home</a>
            <a href="http://olly.fifecomptech.net/~s2264629/musicOnline.com/tracing.php">Tracking</a>
            <a href="http://olly.fifecomptech.net/~s2264629/musicOnline.com/news.php">News</a>
            <a href="http://olly.fifecomptech.net/~s2264629/musicOnline.com/contact.php">Contact</a>
            <a href="http://olly.fifecomptech.net/~s2264629/musicOnline.com/product.php">Products</a>
            <a href="http://olly.fifecomptech.net/~s2264629/musicOnline.com/notification.php">Notification</a>
            <a href="http://olly.fifecomptech.net/~s2264629/musicOnline.com/notification.php">Cart</a>

            <?php if (isset($_SESSION["user_id"])): ?>
            <span>Welcome, <strong><?php echo htmlspecialchars($_SESSION["username"]); ?></strong>!</span>
            <a href="http://olly.fifecomptech.net/~s2264629/musicOnline.com/logout.php">Logout</a>
            <a href="http://olly.fifecomptech.net/~s2264629/musicOnline.com/userpanel.php">Sell Items</a>
        <?php else: ?>
            <a href="http://olly.fifecomptech.net/~s2264629/musicOnline.com/login.php">Log In</a>
            <a href="http://olly.fifecomptech.net/~s2264629/musicOnline.com/register.php">Register</a>
        <?php endif; ?>
        </nav>
</header>
<section class="allcontent">
<section class="search-section">
    <div class="logo">
        <img src="images/main/musiconline.jpg" alt="Logo">
    </div>
    
    <div class="search-box">
            <form id="searchForm">
                <input type="text" id="live_search" name="query" placeholder="Search bar" required>
                <select id="category" name="category">
                    <option value="">All Categories</option>
                    <option value="rock">Rock</option>
                    <option value="pop">Pop</option>
                    <option value="jazz">Jazz</option>
                    <option value="hiphop">Hip-Hop</option>
                    <option value="trance">Hip-Hop</option>
                </select>
                <button type="submit">Search</button>
            </form>
        </div>
    
</section>
<div id="searchresult"></div>



<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        // 🚀 Obsługa dynamicznego wyszukiwania
        $("#live_search, #category").on("input change", function() {
            var input = $("#live_search").val();
            var category = $("#category").val();

            if (input !== "") {
                console.log("AJAX Triggered: " + input + " | Category: " + category); // 🚀 Debugging
                $.ajax({
                    url: "livesearch.php",  
                    method: "POST",
                    data: { input: input, category: category },
                    success: function(data) {
                        $("#searchresult").html(data).show();
                    },
                    error: function(xhr, status, error) {
                        console.log("AJAX Error: " + error); // 🚀 Debugging
                    }
                });
            } else {
                $("#searchresult").hide();
            }
        });

        // 🚀 Obsługa wyszukiwania po kliknięciu "Search"
        $("#searchForm").submit(function(event) {
            event.preventDefault();
            var input = $("#live_search").val();
            var category = $("#category").val();
            
            console.log("Submit Triggered: " + input + " | Category: " + category); // 🚀 Debugging

            $.ajax({
                url: "livesearch.php",
                method: "POST",
                data: { input: input, category: category },
                success: function(data) {
                    $("#searchresult").html(data).show();
                },
                error: function(xhr, status, error) {
                    console.log("AJAX Submit Error: " + error); // 🚀 Debugging
                }
            });
        });
    });
</script>
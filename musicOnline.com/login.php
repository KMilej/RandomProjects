<?php
# Script basic.Connect.php

$pageTitle = 'Logowanie';

include('header.php');

// require('mysqlConnectSample.php');  //mysqlConnect22

?>

<section class="advert">
<div class="advertising">
    <div class="slideshow">
        <img src="images/slide/slidepage1.jpg" class="slide" alt="Ad 1">
        <img src="images/slide/slidepage2.jpg" class="slide" alt="Ad 2">
        <img src="images/slide/slidepage3.jpg" class="slide" alt="Ad 3">
    </div>
</div>

</section>

<section class="login">
    
<h2>Login</h2>
<form action="access.php" method="post">
    <label for="username">Username:</label>
    <input type="text" id="username" name="username" required>
    <br><br>
    <label for="password">Password:</label>
    <input type="password" id="password" name="password" required>
    <br><br>
    <button type="submit">Log In</button>
</form>
</section>

<section class="registor">
    <button onclick="window.location.href='register.php';">Register</button>
</section>

<?php
include('footer.php');
?>


<?php
$pageTitle = "Main";
include('header.php');
?>

<section class="loginscreen">
        <div class="window">
            <h2>Login</h2>
            <form action="access.php" method="post">
                
                <input type="text" name="username" placeholder="username" required>
                <div class="password-wrapper">
                    <input type="password" id="password" name="password" placeholder="Password" required>
                    <span class="toggle-password" onclick="togglePassword()">👁️</span>
                  </div>
                
                <button type="submit">Sign In</button>
            </form>
        </div>
</section>

<!-- <?php echo password_hash("admin12!", PASSWORD_DEFAULT); ?> -->

<?php
include('footer.php');
?>
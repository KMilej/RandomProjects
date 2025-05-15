<?php
$pageTitle = "Register";
include('header.php');


// should collect error from this session?
$errors = $_SESSION['register_errors'] ?? [];
$success = $_SESSION['register_success'] ?? '';

unset($_SESSION['register_errors'], $_SESSION['register_success']); // clear session after displaying
?>



<div class="window">
        <h2>Register Now</h2>
    
        <?php if (!empty($errors)): ?>
            <div style="color: red;">
                <ul>
                    <?php foreach ($errors as $err): ?>
                        <li><?php echo htmlspecialchars($err); ?></li>
                    <?php endforeach; ?>
                </ul>
            </div>
        <?php elseif (!empty($success)): ?>
            <div style="color: green;"><?php echo $success; ?></div>
        <?php endif; ?>
    
        <form method="post" action="phpactions/register_process.php">
            <input type="text" name="username" placeholder="Username" required>
            <input type="email" name="email" placeholder="Email" required>
            <input type="password" name="password" placeholder="Password" required>
            <input type="password" name="confirm_password" placeholder="Confirm Password" required>
            <button type="submit">Register Now</button>
        </form>
    </div>

<!-- htmlspecialchars() chroni przed XSS

password_hash() zabezpiecza hasło

filter_var() sprawdza email

preg_match() sprawdza siłę hasła

prepare + execute chroni przed SQL injection -->

<?php
include('footer.php');
?>
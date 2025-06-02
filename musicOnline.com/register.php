

<?php
/*
  HF5735 Web Development: Dynamically Generated Content 
  Author: Kamil Milej | Date: 30.05.2025 
  Version: 1.0
*/

$pageTitle = 'Register';
include('header.php'); // Include header (optional)
?>

<section class="register">
    <h2>Register</h2>

    <!-- Display errors if any -->
    <?php
    // Display error message if 'error' is set in the URL
    if (isset($_GET['error'])) {
        echo "<p style='color:red;'>" . htmlspecialchars($_GET['error']) . "</p>";
    }

    // Display success message if 'success' is set in the URL
    if (isset($_GET['success'])) {
        echo "<p style='color:green;'>" . htmlspecialchars($_GET['success']) . "</p>";
    }
    ?>

    <form action="process_register.php" method="post">
        <label for="username">Username:</label>
        <input type="text" id="username" name="username" required>
        <br><br>

        <label for="firstname">First Name:</label>
        <input type="text" id="firstname" name="first_name" required>
        <br><br>

        <label for="lastname">Last Name:</label>
        <input type="text" id="lastname" name="last_name" required>
        <br><br>

        <label for="address">Address:</label>
        <input type="text" id="address" name="address" required>
        <br><br>
       
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required>
        <br><br>

        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required>
        <br><br>

        <label for="confirm_password">Confirm Password:</label>
        <input type="password" id="confirm_password" name="confirm_password" required>
        <br><br>

        <button type="submit">Register</button>
    </form>
</section>

<?php
include('footer.php'); // Include footer (optional)
?>

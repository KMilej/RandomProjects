<?php
$pageTitle = "Register";
// Include header template
include('partials/header.php');

// Get and display any registration errors or success messages from session
$errors = $_SESSION['register_errors'] ?? [];
$success = $_SESSION['register_success'] ?? '';

// Clear session messages after displaying
unset($_SESSION['register_errors'], $_SESSION['register_success']);
?>

<!-- REGISTER FORM -->
<section class="flex justify-center items-center w-full mt-12 px-4">
  <div class="bg-red-200 p-8 rounded-lg shadow-lg w-full max-w-md text-center">
    <h2 class="text-2xl font-bold text-gray-800 mb-6">Register Now</h2>

    <!-- Display validation errors if any -->
    <?php if (!empty($errors)): ?>
      <div class="text-red-600 mb-4 text-left">
        <ul class="list-disc list-inside">
          <?php foreach ($errors as $err): ?>
            <li><?php echo htmlspecialchars($err); ?></li>
          <?php endforeach; ?>
        </ul>
      </div>
    
    <!-- Display success message if registration was successful -->
    <?php elseif (!empty($success)): ?>
      <div class="text-green-600 font-medium mb-4"><?php echo $success; ?></div>
    <?php endif; ?>

    <!-- Registration form -->
    <form method="post" action="phpactions/register_process.php">
      <!-- Username input -->
      <input type="text" name="username" placeholder="Username" required
        class="w-full p-3 mb-4 border border-gray-300 rounded-lg focus:outline-none focus:border-blue-500">
      
      <!-- Email input -->
      <input type="email" name="email" placeholder="Email" required
        class="w-full p-3 mb-4 border border-gray-300 rounded-lg focus:outline-none focus:border-blue-500">
      
      <!-- Password input -->
      <input type="password" name="password" placeholder="Password" required
        class="w-full p-3 mb-4 border border-gray-300 rounded-lg focus:outline-none focus:border-blue-500">
      
      <!-- Confirm password input -->
      <input type="password" name="confirm_password" placeholder="Confirm Password" required
        class="w-full p-3 mb-6 border border-gray-300 rounded-lg focus:outline-none focus:border-blue-500">
      

      <button type="submit"
        class="w-full p-3 bg-blue-600 hover:bg-blue-700 text-white font-bold rounded-lg transition">Register Now</button>
    </form>
  </div>
</section>

<?php
include('partials/footer.php');
?>

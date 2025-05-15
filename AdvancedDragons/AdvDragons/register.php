<?php
$pageTitle = "Register";
include('header.php');

$errors = $_SESSION['register_errors'] ?? [];
$success = $_SESSION['register_success'] ?? '';

unset($_SESSION['register_errors'], $_SESSION['register_success']);
?>

<!-- REGISTER FORM -->
<section class="flex justify-center items-center w-full mt-12 px-4">
  <div class="bg-red-200 p-8 rounded-lg shadow-lg w-full max-w-md text-center">
    <h2 class="text-2xl font-bold text-gray-800 mb-6">Register Now</h2>

    <?php if (!empty($errors)): ?>
      <div class="text-red-600 mb-4 text-left">
        <ul class="list-disc list-inside">
          <?php foreach ($errors as $err): ?>
            <li><?php echo htmlspecialchars($err); ?></li>
          <?php endforeach; ?>
        </ul>
      </div>
    <?php elseif (!empty($success)): ?>
      <div class="text-green-600 font-medium mb-4"><?php echo $success; ?></div>
    <?php endif; ?>

    <form method="post" action="phpactions/register_process.php">
      <input type="text" name="username" placeholder="Username" required
        class="w-full p-3 mb-4 border border-gray-300 rounded-lg focus:outline-none focus:border-blue-500">
      <input type="email" name="email" placeholder="Email" required
        class="w-full p-3 mb-4 border border-gray-300 rounded-lg focus:outline-none focus:border-blue-500">
      <input type="password" name="password" placeholder="Password" required
        class="w-full p-3 mb-4 border border-gray-300 rounded-lg focus:outline-none focus:border-blue-500">
      <input type="password" name="confirm_password" placeholder="Confirm Password" required
        class="w-full p-3 mb-6 border border-gray-300 rounded-lg focus:outline-none focus:border-blue-500">
      <button type="submit"
        class="w-full p-3 bg-blue-600 hover:bg-blue-700 text-white font-bold rounded-lg transition">Register Now</button>
    </form>
  </div>
</section>

<!-- htmlspecialchars() chroni przed XSS
password_hash() zabezpiecza hasło
filter_var() sprawdza email
preg_match() sprawdza siłę hasła
prepare + execute chroni przed SQL injection -->

<?php
include('footer.php');
?>
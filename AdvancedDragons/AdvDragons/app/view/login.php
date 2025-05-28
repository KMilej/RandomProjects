<?php $pageTitle = "Main"; ?>
<?php include(__DIR__ . '/partials/header.php'); ?>

<!-- LOGIN SCREEN -->
<section class="flex justify-center items-center w-full mt-12 px-4">
  <div class="bg-red-200 p-8 rounded-lg shadow-lg w-full max-w-md text-center">
    <h2 class="text-2xl font-bold text-gray-800 mb-6">Login</h2>

    <!-- Display error message if login fails -->
    <?php if (isset($error)) echo "<p style='color:red;'>$error</p>"; ?>

    <!-- Login form -->
    <form action="index.php?action=login" method="post">
      <!-- Username input -->
      <input type="text" name="username" placeholder="Username" required
        class="w-full p-3 mb-4 border border-gray-300 rounded-lg focus:outline-none focus:border-blue-500">

      <!-- Password input with toggle icon -->
      <div class="relative w-full mb-4">
        <input type="password" id="password" name="password" placeholder="Password" required
          class="w-full p-3 pr-10 border border-gray-300 rounded-lg focus:outline-none focus:border-blue-500">
        <span class="toggle-password absolute right-3 top-1/2 -translate-y-1/2 text-gray-600 text-xl cursor-pointer select-none"
          onclick="togglePassword()">👁️</span>
      </div>

      <!-- Submit -->
      <button type="submit"
        class="w-full p-3 bg-blue-600 hover:bg-blue-700 text-white font-bold rounded-lg transition">Sign In</button>
    </form>
  </div>
</section>

<?php include(__DIR__ . '/partials/footer.php'); ?>

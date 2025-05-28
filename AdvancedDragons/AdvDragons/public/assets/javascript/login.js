// Get the toggle icon element for showing/hiding password
const toggleIcon = document.querySelector(".toggle-password");

if (toggleIcon) {
  // Add click event listener to toggle icon
  toggleIcon.addEventListener("click", function () {
    const passwordInput = document.getElementById("password");

    if (passwordInput) {
      // Toggle password visibility and change icon
      if (passwordInput.type === "password") {
        passwordInput.type = "text";
        toggleIcon.textContent = "🙈"; // Hide password icon
      } else {
        passwordInput.type = "password";
        toggleIcon.textContent = "👁️"; // Show password icon
      }
    }
  });
}

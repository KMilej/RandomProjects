const toggleIcon = document.querySelector(".toggle-password");
    if (toggleIcon) {
      toggleIcon.addEventListener("click", function () {
        const passwordInput = document.getElementById("password");
        if (passwordInput) {
          if (passwordInput.type === "password") {
            passwordInput.type = "text";
            toggleIcon.textContent = "🙈";
          } else {
            passwordInput.type = "password";
            toggleIcon.textContent = "👁️";
          }
        }
      });
    }
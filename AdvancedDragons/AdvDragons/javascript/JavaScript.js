function togglePassword() {
    const passwordInput = document.getElementById("password");
    const toggleIcon = document.querySelector(".toggle-password");
  
    if (passwordInput.type === "password") {
      passwordInput.type = "text";
      toggleIcon.textContent = "🙈";
    } else {
      passwordInput.type = "password";
      toggleIcon.textContent = "👁️";
    }
  }

  document.addEventListener("DOMContentLoaded", function () {
    const buttons = document.querySelectorAll(".side-menu button[data-option]");
    const dropdownToggles = document.querySelectorAll(".dropdown-toggle");
    const mainContent = document.querySelector(".main-content");
  
    const contentMap = {
      tier1: "<h2>Tier 1 Units</h2><p>Szkielety, Piknierzy, Gremliny...</p>",
      tier2: "<h2>Tier 2 Units</h2><p>Łucznicy, Harpie, Zombi...</p>",
      upgraded: "<h2>Upgraded Units</h2><p>Wyższe wersje podstawowych jednostek.</p>",
      // inne wpisy jak "about", "heroes" itd.
    };
  
    // Obsługa rozwijanego menu
    dropdownToggles.forEach(toggle => {
      toggle.addEventListener("click", function () {
        this.parentElement.classList.toggle("open");
      });
    });
  
    // Obsługa kliknięcia opcji
    buttons.forEach(button => {
      button.addEventListener("click", function () {
        const key = this.dataset.option;
        mainContent.innerHTML = contentMap[key] || "<p>Nie znaleziono treści.</p>";
      });
    });
  });
  
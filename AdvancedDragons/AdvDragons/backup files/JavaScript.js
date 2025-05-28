document.addEventListener("DOMContentLoaded", function () {
  // POKAŻ/UKRYJ HASŁO
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

  // ROZWIJANIE DROPDOWNA (TROOPS)
  const upDropdownToggles = document.querySelectorAll(".up-dropdown > .dropdown-toggle");

  upDropdownToggles.forEach(toggle => {
    toggle.addEventListener("click", function () {
      this.parentElement.classList.toggle("open");
    });
  });

  // ŁADOWANIE DANYCH Z JSON (np. DRAGONS)
  const dragonButtons = document.querySelectorAll("button[data-json]");
  const mainContent = document.querySelector(".main-content");

  dragonButtons.forEach(button => {
    button.addEventListener("click", () => {
      const dragonType = button.dataset.json;
      const filePath = `/~s2264629/AdvancedWebScripting/public/assets/json/topic/${dragonType}.json`;


      fetch(filePath)
        .then(response => {
          if (!response.ok) {
            throw new Error("Cant Load file");
          }
          return response.json();
        })
        .then(data => {
          const dragonList = data[dragonType]; // np. data["MysteryDragons"]
          let html = `<h2>${dragonType}</h2><ul>`;
          dragonList.forEach(dragon => {
            html += `
              <li style="margin-bottom: 10px;">
                <strong>${dragon.name}</strong><br>
                <em>${dragon.size}</em><br>
                <span>${dragon.color}</span><br>
                <p>${dragon.description}</p>
              </li>
            `;
          });
          html += "</ul>";
          mainContent.innerHTML = html;
        })
        .catch(err => {
          mainContent.innerHTML = `<p style="color:red;">Błąd: ${err.message}</p>`;
        });
    });
  });
});

// ALL BUTTONS

// Static content for side menu
const staticSections = {
  whatsnew: `
    <h2>What's New?</h2>
    <p>Explore the latest updates, patches, and fan-made expansions for Heroes 3. Stay ahead in battle!</p>
  `,
  about: `
    <h2>About the Game</h2>
    <p>Heroes of Might and Magic III is a turn-based strategy game released in 1999. It remains a classic due to its deep gameplay and fantasy setting.</p>
  `,
  hd: `
    <h2>Heroes 3 HD Edition</h2>
    <p>The HD Edition features updated graphics and modern system support. However, some expansions like Shadow of Death are not included.</p>
  `,
  chronicles: `
    <h2>Heroes Chronicles</h2>
  <img src="/~s2264629/AdvancedWebScripting/public/assets/img/HeroesChronicles.jpg" alt="HeroesChronicles" style="max-width:100%; border-radius:8px; margin-bottom:10px;">
    <p>A series of single-player campaigns that tell the story of Tarnum, an immortal hero on a journey through history.</p>
  `,
  hotab: `
  <h2>Horn of the Abyss</h2>
  <img src="/~s2264629/AdvancedWebScripting/public/assets/img/Horn_of_the_Abyss.png" alt="Horn of the Abyss Banner" style="max-width:100%; border-radius:8px; margin-bottom:10px;">
  <p>A fan-made expansion adding new towns, creatures, campaigns, and mechanics. Widely considered a must-have for fans.</p>
`,

  faction: `
    <h2>Factions</h2>
    <p>Castle, Inferno, Rampart, Dungeon, and more – each with unique creatures, heroes, and playstyle.</p>
  `,
  heroes: `
    <h2>Heroes</h2>
    <p>Discover the legendary commanders of Heroes 3. Each with their own specialties, skills, and spells.</p>
  `
};

// Handle section button clicks
const sectionButtons = document.querySelectorAll("button[data-section]");
const mainContent = document.querySelector(".main-content");

sectionButtons.forEach(button => {
  button.addEventListener("click", () => {
    const key = button.dataset.section;
    mainContent.innerHTML = staticSections[key] || "<p>Content not found.</p>";
  });
});

// right Side bar LIST

document.addEventListener("DOMContentLoaded", function () {
  const toggleBtn = document.getElementById("toggle-towns");
  const townList = document.getElementById("town-list");

  if (toggleBtn && townList) {
    toggleBtn.addEventListener("click", function () {
      const isVisible = townList.style.display === "block";
      townList.style.display = isVisible ? "none" : "block";
      toggleBtn.textContent = isVisible ? "Show More" : "Show Less";
    });
  }
});

document.addEventListener("DOMContentLoaded", () => {
  const mainContent = document.querySelector(".main-content");
  const loadCastle = document.getElementById("loadCastle");
  const template = document.getElementById("castleTemplate");

  loadCastle.addEventListener("click", function (event) {
    event.preventDefault(); // ← to ZATRZYMUJE przeładowanie strony

    const file = this.getAttribute("href");

    fetch(file)
      .then(response => {
        if (!response.ok) throw new Error("Could not load JSON");
        return response.json();
      })
      .then(data => {
        const info = data.castle[0]; // zakładamy że klucz to 'castle'
        mainContent.innerHTML = ""; // wyczyść środek

        const clone = template.content.cloneNode(true);
        clone.querySelector(".castle-name").textContent = info.name;
        clone.querySelector(".castle-img").src = info.img;
        clone.querySelector(".castle-img").alt = info.name;
        clone.querySelector(".castle-description").textContent = info.description;
        clone.querySelector(".castle-color").textContent = "Style: " + info.color;
        clone.querySelector(".castle-size").textContent = "Size: " + info.size;

        mainContent.appendChild(clone);
      })
      .catch(error => {
        mainContent.innerHTML = `<p style="color:red;">Error: ${error.message}</p>`;
      });
  });
});

document.addEventListener('DOMContentLoaded', () => {
  const answers = [
    "Black Dragons are the most powerful – they are immune to all spells and have very high stats. They cannot be resurrected by magic.",
    "Green Dragons are partially resistant to spells but can still be affected by some, unlike Black Dragons who are completely immune.",
    "The best dragons can be found in the Rampart and Dungeon castles – Rampart offers Green and Gold Dragons, while Dungeon offers Red and Black Dragons.",
    "Yes, dragons have area attacks, meaning they can hit multiple adjacent enemies at once, especially effective in tight formations.",
    "Black and Faerie Dragons are fully immune to magic. Gold Dragons are immune to level 1–4 spells only.",
    "Black Dragons are stronger, completely magic-immune, and belong to the Dungeon faction. Gold Dragons are slightly weaker but faster and immune to most spells (level 1–4).",
    "You recruit dragons by building specific dwellings in the Rampart or Dungeon castles, such as the Dragon Cave or Dragon Cliffs.",
    "Yes! Creatures like Faerie Dragons and Crystal Dragons are neutral and can be encountered in certain map locations or hired from special dwellings."
  ];
  

  const buttons = document.querySelectorAll('.toggle-btn');

  buttons.forEach((button, index) => {
    button.addEventListener('click', () => {
      const parent = button.parentElement;

      // Jeśli odpowiedź już istnieje, usuń ją
      const existing = parent.querySelector('.answer');
      if (existing) {
        existing.remove();
        button.textContent = "Display the Answer";
      } else {
        // Utwórz nowy element odpowiedzi
        const answer = document.createElement('div');
        answer.className = 'answer';
        answer.textContent = answers[index];

        parent.appendChild(answer);
        button.textContent = "Close Answer";
      }
    });
  });
});
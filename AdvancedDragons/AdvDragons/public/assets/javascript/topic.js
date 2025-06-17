document.addEventListener("DOMContentLoaded", function () {

  // ⬇ DROPDOWN TOGGLE FOR TROOPS MENU
  const upDropdownToggles = document.querySelectorAll(".up-dropdown > .dropdown-toggle");
  upDropdownToggles.forEach(toggle => {
    toggle.addEventListener("click", function () {
      this.parentElement.classList.toggle("open");
    });
  });

  // ⬇ MAIN CONTENT ELEMENT
  const mainContent = document.querySelector(".main-content");

  // ⬇ LOAD DRAGON DATA FROM JSON (No innerHTML)
  const dragonButtons = document.querySelectorAll("button[data-json]");
  dragonButtons.forEach(button => {
    button.addEventListener("click", () => {
      const dragonType = button.dataset.json;
      const filePath = `/~s2264629/AdvancedWebScripting/public/assets/json/topic/${dragonType}.json`;

      fetch(filePath)
        .then(response => {
          if (!response.ok) throw new Error("Can't load file");
          return response.json();
        })
        .then(data => {
          const dragonList = data[dragonType];
          if (!Array.isArray(dragonList)) throw new Error("Invalid JSON structure");

          mainContent.innerHTML = "";

          const heading = document.createElement("h2");
          heading.textContent = dragonType;
          mainContent.appendChild(heading);

          const ul = document.createElement("ul");

          dragonList.forEach(dragon => {
            const li = document.createElement("li");
            li.style.marginBottom = "10px";

            const name = document.createElement("strong");
            name.textContent = dragon.name;

            const size = document.createElement("em");
            size.textContent = dragon.size;

            const color = document.createElement("span");
            color.textContent = dragon.color;

            const description = document.createElement("p");
            description.textContent = dragon.description;

            li.appendChild(name);
            li.appendChild(document.createElement("br"));
            li.appendChild(size);
            li.appendChild(document.createElement("br"));
            li.appendChild(color);
            li.appendChild(document.createElement("br"));
            li.appendChild(description);

            ul.appendChild(li);
          });

          mainContent.appendChild(ul);
        })
        .catch(err => {
          mainContent.innerHTML = `<p style="color:red;">Error: ${err.message}</p>`;
        });
    });
  });

  // ⬇ STATIC TEXT SECTIONS
  const staticSections = {
    whatsnew: `<h2>What's New?</h2><p>Explore the latest updates, patches, and fan-made expansions for Heroes 3. Stay ahead in battle!</p>`,
    about: `<h2>About the Game</h2><p>Heroes of Might and Magic III is a turn-based strategy game released in 1999. It remains a classic due to its deep gameplay and fantasy setting.</p>`,
    hd: `<h2>Heroes 3 HD Edition</h2><p>The HD Edition features updated graphics and modern system support. However, some expansions like Shadow of Death are not included.</p>`,
    chronicles: `<h2>Heroes Chronicles</h2><img src="/~s2264629/AdvancedWebScripting/public/assets/img/HeroesChronicles.jpg" alt="HeroesChronicles" style="max-width:100%; border-radius:8px; margin-bottom:10px;"><p>A series of single-player campaigns that tell the story of Tarnum, an immortal hero on a journey through history.</p>`,
    hotab: `<h2>Horn of the Abyss</h2><img src="/~s2264629/AdvancedWebScripting/public/assets/img/Horn_of_the_Abyss.png" alt="Horn of the Abyss Banner" style="max-width:100%; border-radius:8px; margin-bottom:10px;"><p>A fan-made expansion adding new towns, creatures, campaigns, and mechanics. Widely considered a must-have for fans.</p>`,
    faction: `<h2>Factions</h2><p>Castle, Inferno, Rampart, Dungeon, and more – each with unique creatures, heroes, and playstyle.</p>`,
    heroes: `<h2>Heroes</h2><p>Discover the legendary commanders of Heroes 3. Each with their own specialties, skills, and spells.</p>`
  };

  const sectionButtons = document.querySelectorAll("button[data-section]");
  sectionButtons.forEach(button => {
    button.addEventListener("click", () => {
      const key = button.dataset.section;
      mainContent.innerHTML = staticSections[key] || "<p>Content not found.</p>";
    });
  });

  // ⬇ TOGGLE TOWN LIST
  const toggleBtn = document.getElementById("toggle-towns");
  const townList = document.getElementById("town-list");
  if (toggleBtn && townList) {
    toggleBtn.addEventListener("click", function () {
      const isVisible = townList.style.display === "block";
      townList.style.display = isVisible ? "none" : "block";
      toggleBtn.textContent = isVisible ? "Show More" : "Show Less";
    });
  }

  // ⬇ LOAD TOWN JSON TEMPLATE
  const loadCastle = document.getElementById("loadCastle");
  const template = document.getElementById("castleTemplate");

  if (loadCastle && template) {
    loadCastle.addEventListener("click", function (event) {
      event.preventDefault();

      const file = this.getAttribute("href");

      fetch(file)
        .then(response => {
          if (!response.ok) throw new Error("Could not load JSON");
          return response.json();
        })
        .then(data => {
          const info = data.castle?.[0];
          if (!info) throw new Error("Invalid JSON structure");

          mainContent.innerHTML = "";

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
  }

});

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
        const existing = parent.querySelector('.answer');
  
        if (existing) {
          existing.remove();
          button.textContent = "Display the Answer";
        } else {
          const answer = document.createElement('div');
          answer.className = 'answer';
          answer.textContent = answers[index];
  
          parent.appendChild(answer);
          button.textContent = "Close Answer";
        }
      });
    });
  });
  
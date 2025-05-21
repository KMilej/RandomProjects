<?php
$pageTitle = "topicinformation";
include('header.php');
?>

<div class="page-background">
  <div class="content three-column-layout">

    <!-- LEFT COLUMN: MENU -->
    <aside class="side-menu">
            <ul>
                <li><button data-section="whatsnew">What's New?</button></li>
                <li><button data-section="about">About the Game</button></li>
                <li><button data-section="hd">Heroes 3 HD Edition</button></li>
                <li><button data-section="chronicles">Heroes Chronicles</button></li>
                <li><button data-section="hotab">Horn of the Abyss</button></li>
                <li><button data-section="faction">Faction</button></li>
              
                <li class="up-dropdown">
                  <button class="dropdown-toggle">Troops</button>
                  <ul class="dropdown">
                    <li><button data-json="MysteryDragons">Mystery Dragons</button></li>
                    <li><button data-json="StrikeDragons">Strike Dragons</button></li>
                    <li><button data-json="StrokerDragons">Stoker Dragons</button></li>
                  </ul>
                </li>
              
                <li><button data-section="heroes">Heroes</button></li>
              </ul>
              
          </aside>

    <!-- CENTER COLUMN: MAIN CONTENT -->
    <main class="main-content">
  <h1>Welcome to the best page in the world about Heroes 3</h1>

  <p>
    <strong>The Last Stand of Steadwick</strong><br>
    The sun dipped below the horizon, casting long shadows over the once-glorious capital of Erathia, Steadwick. The city's walls, now scarred and battered, bore silent witness to the relentless sieges it had endured. Within the heart of the city, Queen Catherine Ironfist stood atop the battlements, her gaze fixed on the approaching darkness.
    <br><br>
    It had been weeks since the necromancers of Deyja had resurrected her father, King Nicolas Gryphonheart, turning him into a powerful lich to lead their undead legions. The betrayal cut deep, but Catherine's resolve was unshaken. She had rallied the remnants of her father's army, forging uneasy alliances with the elves of AvLee and the wizards of Bracada.
  </p>

  <p>
    As night fell, the eerie glow of torches illuminated the enemy ranks. Skeletons, wights, and dread knights assembled in formation, their hollow eyes reflecting the malevolent will of their masters. At their forefront stood the Lich King, once Nicolas Gryphonheart, now a twisted mockery of his former self.
    <br><br>
    Catherine turned to her generals. "Tonight, we fight not just for Erathia, but for the soul of our kingdom. We must free my father from this cursed existence."
  </p>

  <p>
    The battle commenced with a thunderous clash. Spells lit up the night sky, and the air was thick with the sounds of steel meeting bone. Amidst the chaos, Catherine led a daring charge towards the Lich King, her sword gleaming with righteous fury.
    <br><br>
    As they engaged, memories of her father's teachings flooded her mind. With a final, heartfelt plea, she struck a decisive blow, shattering the dark enchantment that bound his soul. The Lich King's form crumbled, and a momentary peace settled over the battlefield.
    <br><br>
    The undead army, leaderless, faltered and retreated. Steadwick had held firm, and Erathia's spirit remained unbroken.
  </p>
</main>


    <!-- RIGHT COLUMN: RANDOM STUFF -->
    <aside class="right-sidebar">
            <h2>Towns</h2>
            <button id="toggle-towns">Show More</button>

            <ul id="town-list" class="hidden-town-list">
            <li><a href="json/Towns/castle.json" id="loadCastle">🏰 Castle</a></li>
            <li>🏛️ Rampart</li>
            <li>💀 Necropolis</li>
            <li>🔥 Inferno</li>
            <li>🐉 Dungeon</li>
            <li>🌲 Fortress</li>
            <li>⚙️ Tower</li>
            <li>⚔️ Stronghold</li>
            <li>⚓ Cove (Horn of the Abyss)</li>
            </ul>

            <!-- 🔽 Template moved here (correctly placed outside the list) -->
            <template id="castleTemplate">
            <div class="castle-card">
                <h2 class="castle-name"></h2>
                <img class="castle-img" />
                <p class="castle-description"></p>
                <p class="castle-color"></p>
                <p class="castle-size"></p>
            </div>
            </template>


          </aside>

  </div>
</div>


<?php
include('footer.php');
?>

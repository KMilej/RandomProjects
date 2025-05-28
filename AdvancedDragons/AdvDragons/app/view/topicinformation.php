<?php
$pageTitle = "topicinformation";

include('partials/header.php');
?>

<div class="page-background">
  <div class="content three-column-layout">

    <!-- LEFT COLUMN: MENU with buttons-->
    <aside class="side-menu">
      <ul>
        <li><button data-section="whatsnew">What's New?</button></li>
        <li><button data-section="about">About the Game</button></li>
        <li><button data-section="hd">Heroes 3 HD Edition</button></li>
        <li><button data-section="chronicles">Heroes Chronicles</button></li>
        <li><button data-section="hotab">Horn of the Abyss</button></li>
        <li><button data-section="faction">Faction</button></li>

        <!-- Dropdown-->
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
        The sun dipped below the horizon, casting long shadows over the once-glorious capital of Erathia, Steadwick...
      </p>

      <p>
        As night fell, the eerie glow of torches illuminated the enemy ranks...
      </p>

      <p>
        The battle commenced with a thunderous clash...
      </p>
    </main>

    <!-- RIGHT COLUMN -->
    <aside class="right-sidebar">
      <h2>Towns</h2>
      <button id="toggle-towns">Show More</button>

      <ul id="town-list" class="hidden-town-list">
        <li><a href="<?= BASE_URL ?>public/assets/json/topic/castle.json" id="loadCastle">🏰 Castle</a></li>
        <li>🏛️ Rampart</li>
        <li>💀 Necropolis</li>
        <li>🔥 Inferno</li>
        <li>🐉 Dungeon</li>
        <li>🌲 Fortress</li>
        <li>⚙️ Tower</li>
        <li>⚔️ Stronghold</li>
        <li>⚓ Cove (Horn of the Abyss)</li>
      </ul>

      <!-- Template for dynamically loading town data -->
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
include('partials/footer.php');
?>

<?php
$pageTitle = "topicinformation";
include('header.php');
?>

<div class="page-background">
        <div class="content three-column-layout">
      
          <!-- LEWA KOLUMNA: MENU -->
          <aside class="side-menu">
            <ul>
                <li><a href="#">What's new?</a></li>
                <li><a href="#">About Game</a></li>
                <li><a href="#">Heroes 3 HD Edition</a></li>
                <li><a href="#">Heroes Chronicles</a></li>
                <li><a href="#">Horn of the Abyss</a></li>
                <li><a href="#">Fraktion</a></li>
                <li class="up-dropdown">
                    <button class="dropdown-toggle">Troops</button>
                    <ul class="dropdown">
                      <li><button data-option="tier1">Tier 1 Units</button></li>
                      <li><button data-option="tier2">Tier 2 Units</button></li>
                      <li><button data-option="upgraded">Upgraded Units</button></li>
                    </ul>
                </li>
                <li><a href="#">Heroes</a></li>
              </ul>
          </aside>
      
          <!-- ŚRODEK: TREŚĆ GŁÓWNA -->
          <main class="main-content">
            <h1>Witaj na stronie!</h1>
            <p>Tu możesz tworzyć dowolne elementy HTML.</p>
          </main>
      
          <!-- PRAWA KOLUMNA: RANDOM -->
          <aside class="right-sidebar">
            <h2>Losowe info</h2>
            <ul>
              <li>🧙 Cytat: „Magic is power”</li>
              <li>🗡️ Nowa jednostka: Behemot</li>
              <li>🏰 Frakcja tygodnia: Bastion</li>
            </ul>
          </aside>
      
        </div>
      </div>

<?php
include('footer.php');
?>

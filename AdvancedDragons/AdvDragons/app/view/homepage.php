<?php
$pageTitle = "Homepage";

include('partials/header.php');
?>

<div class="image-overlay-wrapper">
    <!-- Main background image -->
    <img src="../../public/assets/img/header.jpg" alt="Heroes" class="main-image-bg">

    <div class="overlay-absolute">
        <div class="left-section">
            <!-- Game introduction section -->
            <h2 class="game-title">
                <a href="https://en.wikipedia.org/wiki/Heroes_of_Might_and_Magic" class="game-title-link">Heroes of Might and Magic</a>
            </h2>
            <p>
                Heroes of Might and Magic is a series of video games originally created and developed by New World Computing.
                As part of the Might and Magic franchise, the series changed ownership when NWC was acquired by 3DO...
            </p>
            <p>
                The game is known for its deep turn-based strategy mechanics, rich fantasy world, and iconic soundtrack.
            </p>


            <h2 class="game-title">
                <a href="https://heroes.net.pl/nowina/3869" class="game-title-link">Artists of Sword and Magic</a>
            </h2>
            <p>
                The next shipments of the board game Heroes III from Archon Studio are being delivered. This time, these are copies ordered during the second Kickstarter campaign as part of the so-called "legacy shipment", so this applies to the base game and add-ons developed for the first campaign. The add-ons Wrota Elementów (Elemental Gate), Przystań (Haven), Twierdza (Stronghold) and the special Sea Battles add-on will be delivered in the fall (September was announced, but this may still change). In the meantime, you can already familiarize yourself with the content of these add-ons by downloading the mission notebooks, also available on our website in the Download section. For now, these materials are only available in English. Therefore, we have updated the Map Locations section with planned new objects. Their descriptions may change slightly when the official Polish translation is available.
            </p>


            <h2 class="game-title">
                <a href="https://heroes.net.pl/nowina/3866" class="game-title-link">Heroes 3 Arena Cup</a>
            </h2>
            <p>
                The competition to complete 5 consecutive maps in the fewest turns for the second time in a row is taking place on the VCMI platform. The first map is already available, and the deadline for its submission is the end of Sunday, March 16. For more details, please see the Tournament topic: the VCMI Tournament topic can be downloaded here: https://vcmi.eu/download/
            </p>


            <h2 class="game-title">
                <a href="https://heroes.net.pl/nowina/3866" class="game-title-link">Horn of the Abyss 1.7.2</a>
            </h2>
            <p>Polish version compatible with the latest version of Horn of the Abyss mod now available.</p>

            <p>UPDATE 31.01.2025 - a hotfix for the Polish version has appeared, we recommend downloading the localization patch again.</p>

            <p>The update includes:</p>
            <li>⬛️ restored complete Haven campaigns, focusing on brothers Jeremy and Bidely, including previously prepared dubbing of cutscenes.</li>
            <li>⬛️ all descriptions of changes to mechanics introduced in patch 1.7.2.</li>
            <li>⬛️ all new individual scenarios translated.</li>
            <li>⬛️ another portion of corrections in original scenarios (naming and alliance designations).</li>
            <li>⬛️ further unification of names and supplementation of missing translations.</li>

            <p>At the same time, we would like to inform you that work on the translation of the Factory campaign is already well advanced. However, we will have to wait for the Dargem campaign.</p>

            <!-- Voiceover contest info -->
            <h2 class="game-title">
                <a href="https://heroes.net.pl/nowina/3867" class="game-title-link">Big Voiceover Contest - lend your voice to Horn of the Abyss and/or Might & Magic VI!</a>
            </h2>
            <p>
                With undisguised joy and excitement I would like to invite you all to the DUBBING CONTEST announced a long time ago. This is not just any contest, it's a double one! In addition to the opportunity to become the voice of one of the 7 heroes of the Horn of the Abyss campaign, you will also have a chance to get into Might and Magic VI: Mandate of Heaven - a game that has never had an official Polish language version. It's time to change that and enrich the fan-made Polonization of Kwasowa Grota. Here, there will be... as many as 50 voices to cast, minimum! In total, at least 12 female voices and 45 male voices are needed.
            </p>  
        </div>

        <!-- Sidebar with dragon highlights -->
        <div class="right-section">
            <div class="top-box">
                <h3>All Mighty DRAGONS</h3>
                <img src="<?= BASE_URL ?>public/assets/img/Bdragon.jpg" alt="Dragon" class="dragon-img">
                <ul>
                    <li>
                        In Heroes of Might and Magic III, the Black Dragon is one of the most powerful and iconic creatures in the game, especially renowned in the Dungeon faction. Here's a breakdown of what makes the Black Dragon so special:
                    </li>
                    <li class="dragon-row">
                        <img src="<?= BASE_URL ?>public/assets/img/gdragon.jpg" alt="Dragon" class="dragon-img">
                        <span>
                            In Heroes of Might and Magic III: Armageddon's Blade and The Shadow of Death expansions, the Gold Dragon is the upgraded Level 7 unit of the Rampart faction. Like the Black Dragon, it is one of the most powerful creatures in the game, with unique traits that reflect its ancient and majestic lore.
                        </span>
                    </li>
                </ul>
            </div>

            <!-- Info box with link to detailed topic -->
            <div class="bottom-box">
                <h3 class="fancy-header">What Kind of Dragons Do We Have?</h3>
                <ul>
                    <li>
                        Dragons are among the most powerful and iconic creatures in the game. Most of them are Level 7 units, the highest tier available, and are known for their massive damage, high health, and often unique abilities such as spell immunity or breath attacks.
                    </li>
                    <li>
                        <a href="<?= BASE_URL ?>app/view/topicinformation.php" target="_blank" class="dragon-link">dive in to it</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>

<?php
include('partials/footer.php');
?>

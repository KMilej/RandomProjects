window.onload = function () {
    const moreLink = document.getElementById("show-more");
    const hiddenParagraphs = document.querySelectorAll("#tohide");

    // Ukryj paragrafy po załadowaniu strony
    hiddenParagraphs.forEach(p => p.style.display = "none");

    // when klick 
    moreLink.onclick = function (e) {  // this function start on action click
        e.preventDefault();

        // check if is visible then 
        const isVisible = hiddenParagraphs[0].style.display === "block";

        if (isVisible) {
            hiddenParagraphs.forEach(p => p.style.display = "none");
            moreLink.textContent = "Click for more";
        } else {
            hiddenParagraphs.forEach(p => p.style.display = "block");
            moreLink.textContent = "Click for less";
        }
    };

    const showMenu = document.getElementById("show-menu");
    const hidemenu = document.getElementById("navigation1");

    showMenu.onclick = function (click) {
        click.preventDefault(); // prevent website after click to nnot move on the top


        const isVisible = window.getComputedStyle(hidemenu).display !== "none";

        if (isVisible) {
            // if visible hide
            hidemenu.style.display = "none";
            showMenu.textContent = "show Menu";
        } else {
            // if hide visible
            hidemenu.style.display = "block";
            showMenu.textContent = "Hide Menu";
        }
    };
};
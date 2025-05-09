document.getElementById("load").addEventListener("click", function () {
    fetch('miniData.json')
        .then(response => response.json())
        .then(data => {
            const output = document.getElementById("fileContent");

            const h1 = document.createElement("h1");
            h1.textContent = data.location;

            const p = document.createElement("p");
            p.textContent = data.property;

            output.appendChild(h1);
            output.appendChild(p);
        });
});

document.addEventListener("DOMContentLoaded", () => {
    const loadEmployees = document.getElementById("loadEmployees");

    // Check if the element exists
    loadEmployees.addEventListener("click", function (event) {
        event.preventDefault(); // Prevent the default link behavior

        const file = loadEmployees.getAttribute("href");
        grabFile(file); // This function should be defined elsewhere
    });
});

function grabFile(file) {
    fetch(file)
        .then(response => {
            if (!response.ok) throw new Error("Network response was not ok");
            return response.json();
        })
        .then(data => displayEmployees(data.employees))
        .catch(error => console.error("Fetch error:", error));
}

function displayEmployees(employees) {
    const container = document.getElementById("employeecontent");

    // Clear existing content
    while (container.firstChild) {
        container.removeChild(container.firstChild);
    }

    const header = document.createElement("h2");
    header.textContent = "EMPLOYEES";
    container.appendChild(header);

    employees.forEach(emp => {
        const nameElem = document.createElement("p");
        nameElem.textContent = emp.surname;
        container.appendChild(nameElem);

        const jobElem = document.createElement("p");
        jobElem.textContent = emp.jobtitle;
        container.appendChild(jobElem);

        const salElem = document.createElement("p");
        salElem.textContent = emp.salary;
        container.appendChild(salElem);
        
        const lineElem = document.createElement("p");
        lineElem.textContent = "========================";
        container.appendChild(lineElem);
    });

}

document.addEventListener("DOMContentLoaded", () => {
    const loadEmployees = document.getElementById("loadEmployeess");

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

    const template = document.getElementById("employeeTemplate");

    employees.forEach(emp => {
        // Clone the template content
        const tempClone = template.content.cloneNode(true); // true keeps children, false is just the element node. clone doesn't grab event listeners or value attributes, they need manual copying

        tempClone.querySelector(".surname").textContent = emp.surname;
        tempClone.querySelector(".jobtitle").textContent = emp.jobtitle;
        tempClone.querySelector(".salary").textContent = emp.salary;

        container.appendChild(tempClone);
    });
}

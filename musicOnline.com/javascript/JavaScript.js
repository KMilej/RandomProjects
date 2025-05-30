document.addEventListener("DOMContentLoaded", function () {
    let slides = document.querySelectorAll(".slideshow img");
    let index = 0;

    function showNextSlide() {
        slides[index].classList.remove("active");
        index = (index + 1) % slides.length; 
        slides[index].classList.add("active"); 
    }

    slides[index].classList.add("active"); // show 1st img
    setInterval(showNextSlide, 3000); // change advertising every 3s
});

    // show add items
    function showProductForm() {
        let form = document.getElementById("productForm");
        if (form.style.display === "none" || form.style.display === "") {
            form.style.display = "block"; // show form
        } else {
            form.style.display = "none"; // hide form
        }
    }


    // $(document).ready(function() {
    //     $("#addProductForm").submit(function(event) {
    //         event.preventDefault(); // Zapobiega przeładowaniu strony
    //         var formData = new FormData(this);

    //         $.ajax({
    //             url: "",  // Wysyłanie do TEGO SAMEGO PLIKU PHP
    //             type: "POST",
    //             data: formData,
    //             processData: false,
    //             contentType: false,
    //             success: function(response) {
    //                 let jsonData = JSON.parse(response);
    //                 $("#message").html(jsonData.message); // Wyświetl komunikat
    //                 $("#addProductForm")[0].reset(); // Czyści formularz
    //             },
    //             error: function(xhr, status, error) {
    //                 $("#message").html("❌ Error: " + error);
    //             }
    //         });
    //     });
    // });

    $(document).ready(function() {
        $("#addProductForm").submit(function(event) {
            event.preventDefault(); // 🚀 Prevent default form submission
    
            var formData = new FormData(this);
            console.log("✅ Sending FormData:", [...formData.entries()]); // 🔍 Debugging
    
            $.ajax({
                url: "addproduct.php", // 🚀 PHP file handling the upload
                type: "POST",
                data: formData,
                processData: false,
                contentType: false,
                dataType: "json", // Expect JSON response from server
                success: function(response) {
                    console.log("✅ Server Response:", response); // 🔍 Debugging
                    alert(response.message); // Show the message in an alert
                    if (response.message.includes("✅")) {
                        $("#addProductForm")[0].reset(); // Reset form only on success
                    }
                },
                error: function(xhr, status, error) {
                    console.log("❌ AJAX Error:", error);
                    alert("❌ Error: " + error);
                }
            });
        });
    });
    
       
    document.addEventListener("DOMContentLoaded", function () {
        let showProductsBtn = document.getElementById("showProducts");
        if (showProductsBtn) {
            showProductsBtn.addEventListener("click", showProductForm2);
        }
    });
    
    function showProductForm2() {
        let productForm2 = document.getElementById("productForm2");
    
        // 🚀 Toggle: hide form and show again
        if (productForm2.style.display === "none" || productForm2.style.display === "") {
            productForm2.style.display = "block"; 
    
            // 🚀 fetch from AJAX
            fetch("getproducts.php")
                .then(response => response.json())
                .then(products => {
                    let output = "<h2>Your Products</h2>";
                    if (products.length === 0) {
                        output += "<p>No products found.</p>";
                    } else {
                        output += "<table border='1'>";
                        output += "<tr><th>Image</th><th>Title</th><th>Price</th><th>Description</th><th>Category</th><th>Actions</th></tr>";
                        products.forEach(product => {
                            output += `
                                <tr>
                                    <td><img src="images/products/${product.image}" width="50"></td>
                                    <td>${product.title}</td>
                                    <td>${product.price}</td>
                                    <td>${product.description}</td>
                                    <td>${product.category}</td>
                                    <td>
                                        <button onclick="editProduct(${product.id}, '${product.title}', '${product.price}', '${product.description}', '${product.category}')">Edit</button>
                                        <button onclick="deleteProduct(${product.id})">Delete</button>
                                    </td>
                                </tr>
                            `;
                        });
                        output += "</table>";
                    }
                    document.getElementById("productsContainer").innerHTML = output;
                })
                .catch(error => console.error("❌ Error:", error));
        } else {
            productForm2.style.display = "none"; // 🚀 Jeśli formularz jest widoczny, ukryj go
        }
    }
    
    // delete products
    function deleteProduct(id) {
        if (!confirm("Are you sure you want to delete this product?")) return;
    
        fetch("delete_product.php", {
            method: "POST",
            headers: { "Content-Type": "application/x-www-form-urlencoded" },
            body: "id=" + id
        })
        .then(response => response.json())
        .then(data => {
            alert(data.message);
            document.getElementById("showProducts").click(); // Odśwież listę produktów
        })
        .catch(error => console.error("❌ Error:", error));
    }
// edit products
    function editProduct(id, title, price, description, category) {
        let newTitle = prompt("Edit Title:", title);
        let newPrice = prompt("Edit Price:", price);
        let newDescription = prompt("Edit Description:", description);
        let newCategory = prompt("Edit Category:", category);
    
        fetch("edit_product.php", {
            method: "POST",
            headers: { "Content-Type": "application/x-www-form-urlencoded" },
            body: `id=${id}&title=${newTitle}&price=${newPrice}&description=${newDescription}&category=${newCategory}`
        })
        .then(response => response.json())
        .then(data => {
            alert(data.message);
            document.getElementById("showProducts").click(); // Odśwież listę
        })
        .catch(error => console.error("❌ Error:", error));
    }
    
    //  ADMIN MENU

    document.addEventListener("DOMContentLoaded", function () {
        // 🚀 Obsługa przycisku "Manage Users"
        document.getElementById("manageUsersBtn").addEventListener("click", function () {
            toggleSection("manageUsersSection");
        });
    
        // 🚀 Obsługa przycisku "Manage Products"
        document.getElementById("manageProductsBtn").addEventListener("click", function () {
            toggleSection("manageProductsSection");
        });
    
        // 🚀 Obsługa przycisku "Show All Products"
        document.getElementById("showAllProductsBtn").addEventListener("click", function () {
            console.log("✅ Button clicked! Fetching all products..."); // Debugging
            toggleSection("allProductsContainer");
            fetchProducts("allProductsContainer", "getallproducts.php");
        });
    });
    
    
    // 📌 Funkcja do przełączania sekcji
    function toggleSection(sectionId) {
        let section = document.getElementById(sectionId);
        section.style.display = (section.style.display === "none" || section.style.display === "") ? "block" : "none";
    }
    
    // 📌 Pobieranie produktów AJAX-em
    function fetchProducts(containerId, url) {
        fetch(url)
            .then(response => response.json())
            .then(products => {
                let output = "<h2>All Products</h2>";
                if (products.length === 0) {
                    output += "<p>No products found.</p>";
                } else {
                    output += "<table border='1'>";
                    output += "<tr><th>Image</th><th>Title</th><th>Price</th><th>Description</th><th>Category</th><th>Seller</th><th>Actions</th></tr>";
                    products.forEach(product => {
                        output += `
                            <tr>
                                <td><img src="${product.image}" width="50"></td>
                                <td>${product.title}</td>
                                <td>${product.price}</td>
                                <td>${product.description}</td>
                                <td>${product.category}</td>
                                <td>${product.ownedby}</td> <!-- Dodanie sprzedawcy -->
                                <td>
                                    <button onclick="editProduct(${product.id}, '${product.title}', '${product.price}', '${product.description}', '${product.category}')">Edit</button>
                                    <button onclick="deleteProduct(${product.id})">Delete</button>
                                </td>
                            </tr>
                        `;
                    });
                    output += "</table>";
                }
                document.getElementById(containerId).innerHTML = output;
            })
            .catch(error => console.error("❌ Error:", error));
    }

    
//  ADMIN MENU MANAGE USER

document.getElementById("showManageUser").addEventListener("click", function () {
    console.log("✅ Button clicked! Fetching all products..."); // Debugging
    toggleSection("alluserContainer");
    fetchUsers("alluserContainer", "getalluser.php");
});

// function toggleSection(sectionId) {
//     let section = document.getElementById(sectionId);
//     section.style.display = (section.style.display === "none" || section.style.display === "") ? "block" : "none";
// }

// 📌 Pobieranie produktów AJAX-em
function fetchUsers(containerId, url) {
    fetch(url)
        .then(response => response.json())
        .then(users => {
            let output = "<h2>All User List</h2>";
            if (users.length === 0) {
                output += "<p>No users found.</p>";
            } else {
                output += "<table border='1'>";
                output += "<tr><th>Username</th><th>First Name</th><th>Last Name</th><th>Email</th><th>Address</th><th>Role</th><th>Created</th><th>Actions</th></tr>";
                users.forEach(user => {
                    output += `
                        <tr>
                            <td>${user.username}</td>
                            <td>${user.first_name}</td>
                            <td>${user.last_name}</td>
                            <td>${user.email}</td>
                            <td>${user.address}</td>
                            <td>${user.role}</td>
                            <td>${user.created_at}</td>
                            <td>
                                <button onclick="editUser(${user.user_id}, '${user.username}', '${user.email}', '${user.role}')">Edit</button>
                                <button onclick="deleteUser(${user.user_id})">Delete</button>
                            </td>
                        </tr>
                    `;
                });
                
                output += "</table>";
            }
            document.getElementById(containerId).innerHTML = output;
        })
        .catch(error => console.error("❌ Error:", error));
}

function deleteUser(id) {
    console.log("Attempting to delete user with ID:", id); // Debugging

    if (!confirm("Are you sure you want to delete this user?")) return;

    fetch("deleteuser.php", {
        method: "POST",
        headers: { "Content-Type": "application/x-www-form-urlencoded" },
        body: "id=" + id
    })
    .then(response => response.json())
    .then(data => {
        console.log("Delete response:", data); // Debugging
        alert(data.message);
        document.getElementById("showManageUser").click(); // Odśwież listę użytkowników
    })
    .catch(error => console.error("❌ Error:", error));
}

// edit products
function editUser(id, username, email, role) {
    let newusername = prompt("Edit username:", username);
    let newemail = prompt("Edit email:", email);
    let newrole = prompt("Edit role:", role);

    fetch("edituser.php", {
        method: "POST",
        headers: { "Content-Type": "application/x-www-form-urlencoded" },
        body: `id=${id}&username=${encodeURIComponent(newusername)}&email=${encodeURIComponent(newemail)}&role=${encodeURIComponent(newrole)}`
    })
    .then(response => response.json())
    .then(data => {
        alert(data.message);
        document.getElementById("showManageUser").click(); // Odśwież listę użytkowników
    })
    .catch(error => console.error("❌ Error:", error));
}

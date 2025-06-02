// Show rotating slideshow
document.addEventListener("DOMContentLoaded", function () {
    let slides = document.querySelectorAll(".slideshow img");
    let index = 0;

    function showNextSlide() {
        slides[index].classList.remove("active");
        index = (index + 1) % slides.length;
        slides[index].classList.add("active");
    }

    slides[index].classList.add("active"); // show first image
    setInterval(showNextSlide, 3000); // rotate every 3 seconds
});

// Toggle display of product form
function showProductForm() {
    let form = document.getElementById("productForm");
    form.style.display = (form.style.display === "none" || form.style.display === "") ? "block" : "none";
}

$(document).ready(function () {
    // Handle add product (USER)
    $("#addProductForm").submit(function(event) {
        event.preventDefault();
        const formData = new FormData(this);

        $.ajax({
            url: "addproduct.php",
            type: "POST",
            data: formData,
            processData: false,
            contentType: false,
            success: function(response) {
                let jsonData = typeof response === "object" ? response : JSON.parse(response);
                $("#message").html(jsonData.message);
                if (jsonData.message.includes("✅")) {
                    $("#addProductForm")[0].reset();
                }
            },
            error: function(xhr, status, error) {
                $("#message").html(" Error: " + error);
            }
        });
    });

    // Handle edit product (AJAX)
    $("#editProductForm").submit(function (e) {
        e.preventDefault();
        let formData = $(this).serialize();

        $.ajax({
            url: "edit_product.php",
            type: "POST",
            data: formData,
            dataType: "json",
            success: function (response) {
                alert(response.message);
                if (response.message.includes("✅")) {
                    closeEditModal();
                    document.getElementById("showProducts").click();
                }
            },
            error: function (xhr, status, error) {
                alert("❌ Error: " + error);
            }
        });
    });
});

// Show product list and fetch from database
document.addEventListener("DOMContentLoaded", function () {
    let showProductsBtn = document.getElementById("showProducts");
    if (showProductsBtn) {
        showProductsBtn.addEventListener("click", showProductForm2);
    }
});

function showProductForm2() {
    let productForm2 = document.getElementById("productForm2");

    if (productForm2.style.display === "none" || productForm2.style.display === "") {
        productForm2.style.display = "block";

        fetch("getproducts.php")
            .then(response => response.json())
            .then(products => {
                let output = "<h2>Your Products</h2>";
                if (products.length === 0) {
                    output += "<p>No products found.</p>";
                } else {
                    output += "<table border='1'>";
                    output += "<tr><th>Image</th><th>Title</th><th>Artist</th><th>Price</th><th>Description</th><th>Category</th><th>Actions</th></tr>";
                    products.forEach(product => {
                        output += `
                            <tr>
                                <td><img src="images/products/${product.image}" width="50"></td>
                                <td>${product.title}</td>
                                <td>${product.artist}</td>
                                <td>${product.price}</td>
                                <td>${product.description}</td>
                                <td>${product.category}</td>
                                <td>
                                    <button onclick="editProductt(${product.id}, '${product.title}', '${product.artist}', '${product.price}', '${product.description}', '${product.category}')">Edit</button>
                                    <button onclick="deleteProduct(${product.id})">Delete</button>
                                </td>
                            </tr>
                        `;
                    });
                    output += "</table>";
                }
                document.getElementById("productsContainer").innerHTML = output;
            })
            .catch(error => console.error(" Error:", error));
    } else {
        productForm2.style.display = "none";
    }
}

// Delete product by ID
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

        // Check which panel is active and refresh the correct one
        if (document.getElementById("allProductsContainer") && document.getElementById("allProductsContainer").style.display === "block") {
            fetchProducts("allProductsContainer", "getallproducts.php");
        } else {
            showProductForm2();
        }
    })
    .catch(error => console.error("❌ Error:", error));
}


// Edit product (prompt-based)
function editProduct(id, title, artist, price, description, category) {
    let newTitle = prompt("Edit Title:", title);
    let newPrice = prompt("Edit Price:", price);
    let newDescription = prompt("Edit Description:", description);
    let newCategory = prompt("Edit Category:", category);
    let newArtist = prompt("Edit Artist:", artist);

    fetch("edit_product.php", {
        method: "POST",
        headers: { "Content-Type": "application/x-www-form-urlencoded" },
        body: `id=${id}&title=${newTitle}&artist=${newArtist}&price=${newPrice}&description=${newDescription}&category=${newCategory}`
    })
    .then(response => response.json())
    .then(data => {
        alert(data.message);
        document.getElementById("showProducts").click();
    })
    .catch(error => console.error(" Error:", error));
}

// ADMIN: Button listeners and section toggling
document.addEventListener("DOMContentLoaded", function () {
    document.getElementById("manageUsersBtn").addEventListener("click", function () {
        toggleSection("manageUsersSection");
    });

    document.getElementById("manageProductsBtn").addEventListener("click", function () {
        toggleSection("manageProductsSection");
    });

    document.getElementById("showAllProductsBtn").addEventListener("click", function () {
        console.log("✅ Button clicked! Fetching all products...");
        toggleSection("allProductsContainer");
        fetchProducts("allProductsContainer", "getallproducts.php");
    });
});

// Show or hide a section
function toggleSection(sectionId) {
    let section = document.getElementById(sectionId);
    section.style.display = (section.style.display === "none" || section.style.display === "") ? "block" : "none";
}

// Fetch all products for admin
function fetchProducts(containerId, url) {
    fetch(url)
        .then(response => response.json())
        .then(products => {
            let output = "<h2>All Products</h2>";
            if (products.length === 0) {
                output += "<p>No products found.</p>";
            } else {
                output += "<table border='1'>";
                output += "<tr><th>Image</th><th>Title</th><th>Artist</th><th>Price</th><th>Description</th><th>Category</th><th>Seller</th><th>Actions</th></tr>";
                products.forEach(product => {
                    output += `
                        <tr>
                            <td><img src="${product.image}" width="50"></td>
                            <td>${product.title}</td>
                            <td>${product.artist}</td>
                            <td>${product.price}</td>
                            <td>${product.description}</td>
                            <td>${product.category}</td>
                            <td>${product.ownedby}</td>
                            <td>
                                <button onclick="editProductt(${product.id}, '${product.title}', '${product.artist}', '${product.price}', '${product.description}', '${product.category}')">Edit</button>
                                <button onclick="deleteProduct(${product.id})">Delete</button>
                            </td>
                        </tr>
                    `;
                });
                output += "</table>";
            }
            document.getElementById(containerId).innerHTML = output;
        })
        .catch(error => console.error(" Error:", error));
}

// ADMIN: Manage Users
document.getElementById("showManageUser").addEventListener("click", function () {
    toggleSection("alluserContainer");
    fetchUsers("alluserContainer", "getalluser.php");
});

// Fetch all users for admin
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
        .catch(error => console.error(" Error:", error));
}

// Delete user by ID
function deleteUser(id) {
    if (!confirm("Are you sure you want to delete this user?")) return;

    fetch("deleteuser.php", {
        method: "POST",
        headers: { "Content-Type": "application/x-www-form-urlencoded" },
        body: "id=" + id
    })
    .then(response => response.json())
    .then(data => {
        alert(data.message);
        document.getElementById("showManageUser").click();
    })
    .catch(error => console.error(" Error:", error));
}

// Open modal for product edit (form-based)
function editProductt(id, title, artist, price, description, category) {
    document.getElementById("editProductId").value = id;
    document.getElementById("editTitle").value = title;
    document.getElementById("editArtist").value = artist;
    document.getElementById("editPrice").value = price;
    document.getElementById("editDescription").value = description;
    document.getElementById("editCategory").value = category;

    document.getElementById("editProductModal").style.display = "block";
}

// Close modal
function closeEditModal() {
    document.getElementById("editProductModal").style.display = "none";
}

// Edit user info (prompt-based)
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
        document.getElementById("showManageUser").click();
    })
    .catch(error => console.error(" Error:", error));
}

function editProductt(id, title, artist, price, description, category) {
    document.getElementById("editProductId").value = id;
    document.getElementById("editTitle").value = title;
    document.getElementById("editArtist").value = artist;
    document.getElementById("editPrice").value = price;
    document.getElementById("editDescription").value = description;
    document.getElementById("editCategory").value = category;

    document.getElementById("editProductModal").style.display = "block"; // ⬅️ show modal
}

function closeEditModal() {
    document.getElementById("editProductModal").style.display = "none"; // ⬅️ close modal
}

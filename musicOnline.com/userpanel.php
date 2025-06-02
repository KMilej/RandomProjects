

<?php
/*
  HF5735 Web Development: Dynamically Generated Content 
  Author: Kamil Milej | Date: 30.05.2025 
  Version: 1.0
*/

$pageTitle = 'Main';
include('header.php');
?>

<?php if (isset($_SESSION['role'])): ?>
    <?php if ($_SESSION['role'] == 'user'): ?>
    <section class="user-menu">
        <div class="userbutton">
            <button onclick="showProductForm()">Add Product</button>
            <div id="productForm" style="display: none;">
                <h2>Add New Product</h2>
                <p id="message" style="color: green; font-weight: bold;"></p>
                <form id="addProductForm" enctype="multipart/form-data">

                    <label for="artist">Artist:</label>
                    <input type="text" name="artist" required><br>

                    <label for="title">Title:</label>
                    <input type="text" name="title" required><br>

                    <label for="price">Price (GBP):</label>
                    <input type="number" name="price" step="0.01" required><br>

                    <label for="description">Description:</label>
                    <textarea name="description" required></textarea><br>

                    <label for="category">Category:</label>
                    <select name="category" required>
                        <option value="rock">Rock</option>
                        <option value="pop">Pop</option>
                        <option value="jazz">Jazz</option>
                        <option value="hiphop">Hip-Hop</option>
                    </select><br>

                    <label for="image">Product Image:</label>
                    <input type="file" name="image" accept="image/*" required><br>

                    <button type="submit">Submit</button>
                </form>
            </div>
            <button id="showProducts">Show All My Products</button>
                <div id="productForm2" style="display: none;">
                    <div id="productsContainer"></div>
                </div>
        </div>
    </section>

    <?php elseif ($_SESSION['role'] == 'admin'): ?>
        <section class="user-menu">
            <div class="userbutton">
                <!-- Manage Users -->
                <button id="manageUsersBtn">Manage Users</button>
                <div id="manageUsersSection" style="display: none;">
                    <button id="showManageUser">Show & Modify User</button>
                    <div id="alluserContainer" style="display: none;"></div>
                </div>                    

                <!-- Manage Products -->
                <button id="manageProductsBtn">Manage Products</button>
                <div id="manageProductsSection" style="display: none;">
                    <button onclick="showProductForm()">Add Product</button>
                    <div id="productForm" style="display: none;">
                        <h2>Add New Product</h2>
                        <form id="addProductForm" enctype="multipart/form-data">
                            <label for="title">Title:</label>
                            <input type="text" name="title" required><br>

                            <label for="artist">Artist:</label>
                            <input type="text" name="artist" required><br>

                            <label for="price">Price (GBP):</label>
                            <input type="number" name="price" step="0.01" required><br>                                                   

                            <label for="description">Description:</label>
                            <textarea name="description" required></textarea><br>

                            <label for="category">Category:</label>
                            <select name="category" required>
                                <option value="rock">Rock</option>
                                <option value="pop">Pop</option>
                                <option value="jazz">Jazz</option>
                                <option value="hiphop">Hip-Hop</option>
                            </select><br>

                            <label for="image">Product Image:</label>
                            <input type="file" name="image" accept="image/*" required><br>

                            <button type="submit">Submit</button>
                        </form>
                    </div>
                    <button id="showAllProductsBtn">Show All Products</button>
                    <div id="allProductsContainer" style="display: none;"></div>
                </div>
            </div>
        </section>
    <?php endif; ?>
<?php endif; ?>

<div id="editProductModal" style="display:none; position:fixed; top:10%; left:50%; transform:translateX(-50%); background:white; padding:20px; border:2px solid black; z-index:1000;">
    <h3>Edit Product</h3>
    <form id="editProductForm">
        <input type="hidden" name="id" id="editProductId">

        <label>Title:</label>
        <input type="text" name="title" id="editTitle" required><br>

        <label>Artist:</label>
        <input type="text" name="artist" id="editArtist" required><br>

        <label>Price:</label>
        <input type="number" name="price" id="editPrice" step="0.01" required><br>

        <label>Description:</label>
        <textarea name="description" id="editDescription" required></textarea><br>

        <label>Category:</label>
        <select name="category" id="editCategory" required>
            <option value="rock">Rock</option>
            <option value="pop">Pop</option>
            <option value="jazz">Jazz</option>
            <option value="hiphop">Hip-Hop</option>
        </select><br><br>

        <button type="submit">💾 Save</button>
        <button type="button" onclick="closeEditModal()">❌ Cancel</button>
    </form>
</div>

<?php include('footer.php'); ?>

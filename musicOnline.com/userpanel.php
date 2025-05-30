<?php

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
                    
                    <button id= "showManageUser">Show & Modify User</button>
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

<?php include('footer.php'); ?>

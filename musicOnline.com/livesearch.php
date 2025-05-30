<?php
include("config.php"); // Connect to database

if (isset($_POST['input'])) { // Check if search input is provided
    $input = $_POST['input'];

    // Use prepared statement to prevent SQL injection
    $query = "SELECT * FROM products WHERE title LIKE ?";
    $stmt = mysqli_prepare($dbConnect, $query); // Prepare the SQL statement to prevent SQL injection
    $search = $input . '%'; // Append '%' to search for titles starting with the input
    mysqli_stmt_bind_param($stmt, "s", $search); // Bind the search term as a string parameter
    mysqli_stmt_execute($stmt); // Execute the prepared statement
    $result = mysqli_stmt_get_result($stmt); // Get the result set from the executed statement


    if (mysqli_num_rows($result) > 0) {
        echo '<main>
                <div class="products">';

        while ($row = mysqli_fetch_assoc($result)) {
            // Set image path, use placeholder if empty
            $imagePath = !empty($row['image']) ? "images/products/{$row['image']}" : "images/products/placeholder.jpg";

            echo "<div class='productsearch'>
                    <div class='productimgsearch'>
                        <img src='{$imagePath}' alt='Product Image' onerror=\"this.onerror=null; this.src='images/products/placeholder.jpg';\">
                    </div>
                    <div class='product-infosearch'>
                        <div class='title'>
                            <a href='#'>{$row['title']}</a>
                        </div>
                        <div class='description'>{$row['description']}</div>
                        <div class='price'>{$row['price']} $</div>
                    </div>
                  </div>";
        }

        echo '</div></main>';
    } else {
        echo "<h6 class='text-danger text-center mt-3'>No data found</h6>";
    }
}
?>

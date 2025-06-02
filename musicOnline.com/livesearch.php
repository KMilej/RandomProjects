

<?php
/*
  HF5735 Web Development: Dynamically Generated Content 
  Author: Kamil Milej | Date: 30.05.2025 
  Version: 1.0
*/

include('config.php');

if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['input'])) {
    $search = $_POST['input'];
    $category = $_POST['category'] ?? '';

    // Protection against SQL injection
    $search = mysqli_real_escape_string($dbConnect, $search);
    $category = mysqli_real_escape_string($dbConnect, $category);

    // Search by title OR artist
    $sql = "SELECT * FROM products WHERE (title LIKE '%$search%' OR artist LIKE '%$search%')";

    // If a category was selected, add condition
    if (!empty($category)) {
        $sql .= " AND category = '$category'";
    }

    $result = mysqli_query($dbConnect, $sql);

    if (mysqli_num_rows($result) > 0) {
        echo '<main>
                <div class="products">';

        while ($row = mysqli_fetch_assoc($result)) {
            $imagePath = !empty($row['image']) ? "images/products/{$row['image']}" : "images/products/placeholder.jpg";

            echo "<div class='productsearch'>
                    <div class='productimgsearch'>
                        <img src='{$imagePath}' alt='Product Image' onerror=\"this.onerror=null; this.src='images/products/placeholder.jpg';\">
                    </div>
                    <div class='product-infosearch'>
                        <div class='artist'><strong>{$row['artist']}</strong></div>
                        <div class='title'>
                            <a href='pages.php?id={$row['id']}'>" . htmlspecialchars($row['title']) . "</a>
                        </div>
                        <div class='description'>" . htmlspecialchars($row['description']) . "</div>
                        <div class='price'>" . number_format($row['price'], 2) . " $</div>
                    </div>
                  </div>";
        }

        echo '</div></main>';
    } else {
        echo "<h6 class='text-danger text-center mt-3'>No data found</h6>";
    }
} else {
    echo "<h6 class='text-danger text-center mt-3'>Invalid request</h6>";
}
?>

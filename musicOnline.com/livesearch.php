<?php
include('config.php');

if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['input'])) {
    $search = $_POST['input'];
    $category = $_POST['category'] ?? '';

    // Zabezpieczenie przed SQL injection
    $search = mysqli_real_escape_string($dbConnect, $search);
    $category = mysqli_real_escape_string($dbConnect, $category);

    // Szukaj po tytule LUB artyście
    $sql = "SELECT * FROM products WHERE (title LIKE '%$search%' OR artist LIKE '%$search%')";

    // Jeśli wybrano kategorię, dodaj warunek
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

<?php
include('header.php'); // Include header file

// Check if database connection exists
if (!$dbConnect) {
    die("<h1>Error: Database connection failed</h1>");
}

// Check if 'id' is provided in the URL
if (isset($_GET['id'])) {
    $id = intval($_GET['id']); // Convert ID to integer for security

    // Prepare SQL query to fetch product details
    $query = "SELECT * FROM products WHERE id = ?";
    $stmt = mysqli_prepare($dbConnect, $query);
    
    // Bind parameter (i = integer)
    mysqli_stmt_bind_param($stmt, "i", $id);
    
    // Execute query
    mysqli_stmt_execute($stmt);
    
    // Get result
    $result = mysqli_stmt_get_result($stmt);
    
    // Fetch product data as an associative array
    $product = mysqli_fetch_assoc($result);

    // If product is not found, show an error
    if (!$product) {
        die("<h1>Product does not exist</h1>");
    }
} else {
    die("<h1>No product ID provided</h1>");
}
?>

<section class="advert">
<div class="advertising">
    <div class="slideshow">
        <!-- Display slideshow images -->
        <img src="images/slide/slidepage1.jpg" class="slide" alt="Ad 1">
        <img src="images/slide/slidepage2.jpg" class="slide" alt="Ad 2">
        <img src="images/slide/slidepage3.jpg" class="slide" alt="Ad 3">
    </div>
</div>

<div class="individualproduct">
    <div class="row">
        <!-- Left Column - Product Image -->
        <div class="productleft">
            <img src="images/products/<?php echo htmlspecialchars($product['image']); ?>" alt="<?php echo htmlspecialchars($product['title']); ?>">
        </div>

        <!-- Right Column - Product Details -->
        <div class="productright">
            <h2><?php echo htmlspecialchars($product['artist']); ?></h2
            <h1><?php echo htmlspecialchars($product['title']); ?></h1>
            <h4><?php echo number_format($product['price'], 2); ?> PLN</h4>
            <p><strong>Category:</strong> <?php echo htmlspecialchars($product['category']); ?></p>
            <p><?php echo nl2br(htmlspecialchars($product['description'])); ?></p>

            <!-- Add to Cart Button -->
            <form action="cart.php" method="POST">
                <input type="hidden" name="product_id" value="<?php echo $product['id']; ?>">
                <button type="submit" class="btn btn-primary">Add to Cart</button>
            </form>
        </div>
    </div>
</div>

<?php include('footer.php'); // Include footer file ?>

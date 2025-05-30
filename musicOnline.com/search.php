<?php
// Connect to the database
include('config.php');

// Check if a search query is provided
if (isset($_GET['query'])) {
    $search = $_GET['query'];
    $category = $_GET['category'] ?? ''; // Default to empty if no category selected

    // Protect against SQL Injection
    $search = mysqli_real_escape_string($dbConnect, $search);
    $category = mysqli_real_escape_string($dbConnect, $category);

    // Build SQL query to search products by title
    $sql = "SELECT * FROM products WHERE title LIKE '%$search%'";

    // If a category is selected, add it to the query
    if (!empty($category)) {
        $sql .= " AND category = '$category'";
    }

    $result = mysqli_query($dbConnect, $sql);

    echo "<h2>Search results for: <strong>$search</strong></h2>";

    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            // Display search results
            echo "<p><strong>" . $row['title'] . "</strong> - " . $row['description'] . " - $" . $row['price'] . "</p>";
        }
    } else {
        echo "<p>No results found.</p>";
    }
} else {
    echo "<p>Please enter a search term.</p>";
}
?>

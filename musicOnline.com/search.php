
<?php
/*
  HF5735 Web Development: Dynamically Generated Content 
  Author: Kamil Milej | Date: 30.05.2025 
  Version: 1.0
*/

include('config.php'); // DB connection

if (isset($_GET['query'])) {
    $search = $_GET['query'];
    $category = $_GET['category'] ?? '';

    // Sanitize input
    $search = mysqli_real_escape_string($dbConnect, $search);
    $category = mysqli_real_escape_string($dbConnect, $category);

    // Search by title OR artist
    $sql = "SELECT * FROM products WHERE (title LIKE '%$search%' OR artist LIKE '%$search%')";

    // Add category filter if selected
    if (!empty($category)) {
        $sql .= " AND category = '$category'";
    }

    $result = mysqli_query($dbConnect, $sql);

    echo "<h2>Search results for: <strong>" . htmlspecialchars($search) . "</strong></h2>";

    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<p><strong>" . htmlspecialchars($row['title']) . "</strong> by <em>" . htmlspecialchars($row['artist']) . "</em> — " . htmlspecialchars($row['description']) . " — <strong>$" . number_format($row['price'], 2) . "</strong></p>";
        }
    } else {
        echo "<p>No results found.</p>";
    }
} else {
    echo "<p>Please enter a search term.</p>";
}
?>

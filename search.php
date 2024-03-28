<?php
// Include the database connection file
require_once 'db_connection.php';

// Get the search input from the AJAX request
$searchInput = $_GET['searchInput'];

// Check if the search input is empty
if(empty($searchInput)) {
    echo "<p>Please enter an order ID or product name in the search bar.</p>";
} else {
    // Perform a SELECT query to retrieve the order details based on the provided order ID or product name
    $sql = "SELECT * FROM orders WHERE order_id = '$searchInput' OR product_name LIKE '%$searchInput%'";
    $result = $conn->query($sql);

    // Check if any rows were returned
    if ($result->num_rows > 0) {
        // Output data of each row
        while ($row = $result->fetch_assoc()) {
            echo "<div>";
            echo "<p><strong>Order ID:</strong> " . $row["order_id"] . "</p>";
            echo "<p><strong>Product Name:</strong> " . $row["product_name"] . "</p>";
            echo "<p><strong>Product Link:</strong> <a href='" . $row["product_link"] . "'>" . $row["product_link"] . "</a></p>";
            echo "<p><strong>Price:</strong> $" . $row["price"] . "</p>";
            // Output other order details as needed
            echo "</div>";
        }
    } else {
        echo "<p>No results found for Order ID or Product Name: " . $searchInput . "</p>";
    }
}

// Close the database connection
$conn->close();
?>

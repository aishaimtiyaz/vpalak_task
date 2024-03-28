<?php
// Connect to your database
$servername = "localhost";
$username = "username";
$password = "password";
$dbname = "your_database";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch order details based on search option and value
if(isset($_POST['searchOption']) && isset($_POST['searchValue'])) {
    $searchOption = $_POST['searchOption'];
    $searchValue = $_POST['searchValue'];

    // Construct SQL query based on search option
    $sql = "";
    switch ($searchOption) {
        case "orderId":
            $sql = "SELECT * FROM OrderTable WHERE orderId = '$searchValue'";
            break;
        case "mobile":
            // Assuming mobile is a field in the CustomerTable
            $sql = "SELECT * FROM CustomerTable WHERE mobile = '$searchValue'";
            break;
        case "name":
            // Assuming name is a field in the CustomerTable
            $sql = "SELECT * FROM CustomerTable WHERE name = '$searchValue'";
            break;
        case "email":
            // Assuming email is a field in the CustomerTable
            $sql = "SELECT * FROM CustomerTable WHERE email = '$searchValue'";
            break;
        default:
            echo "Invalid search option";
            exit();
    }

    $result = $conn->query($sql);
    
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            // Display order or customer details based on the search option
            // You can adjust this part according to your database structure
            echo "<p>Order ID: " . $row["orderId"] . "</p>";
            echo "<p>Product Name: " . $row["productName"] . "</p>";
            echo "<p>Product Link: " . $row["productLink"] . "</p>";
            // Add other details here
        }
    } else {
        echo "No results found";
    }
}

$conn->close();
?>

<?php
// Database configuration
$servername = "http://localhost/phpmyadmin";
$username = "root"; // default username for XAMPP
$password = ""; // default password for XAMPP
$database = "orders"; // name of the database created in phpMyAdmin

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>

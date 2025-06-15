<?php
// Database Configuration for SharkLibrary
$host = "localhost";
$username = "admin";        // Change if necessary
$password = "adminpass";    // Change if according to the password assigned in MariaDB
$database = "librarydb";

// Connect to the database
$conn = new mysqli($host, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>

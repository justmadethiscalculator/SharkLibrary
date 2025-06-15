<?php
// Database Configuration for SharkLibrary
$host = "127.0.0.1";
$port = 4307;
$username = "admin";
$password = "adminpass";
$database = "librarydb";

// Create connection
$conn = mysqli_connect($host, $username, $password, $database, $port);

// Check connection
if (!$conn) {
    die("Database connection failed: " . mysqli_connect_error());
}
?>
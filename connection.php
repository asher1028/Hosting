<?php
// Use include_once to prevent redeclaration
include_once 'userSessionStart.php';

// Load the .env file
loadEnv(__DIR__ . '/.env'); // Adjust the path if needed

// Access environment variables
$dbHost = getenv('DB_HOST');
$dbUser = getenv('DB_USER');
$dbPassword = getenv('DB_PASSWORD');
$dbName = getenv('DB_NAME');

// Connect to the database
$conn = new mysqli($dbHost, $dbUser, $dbPassword, $dbName);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

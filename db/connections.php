<?php
// Include database configuration file
include_once "./db/connections.php";

// Establish database connection
$db = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);

// Check connection
if (!$db) {
    die("Database connection failed: " . mysqli_connect_error());
}

// Set charset to UTF8 to support special characters
mysqli_set_charset($db, "utf8");

// Return $db object for further database operations
return $db;
?>

<?php

require_once 'db/db.php';

$db = Database::getInstance();
$conn = $db->getConnection();

if(!$conn) {
    echo "Database connection failed. Please check your database configuration.";
    exit;
}
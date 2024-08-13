<?php
// Database configuration
$host = 'localhost';
$db = 'eyemazy_db';
$user = 'root';
$pass = '';

try {
    $databaseConnection  = new PDO("mysql:host=$host;dbname=$db", $user, $pass);
    $databaseConnection ->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Database connection failed: " . $e->getMessage());
}
//  echo "Database connection successful!";

?>
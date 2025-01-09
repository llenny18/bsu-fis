<?php
session_start();
// Database credentials
$host = 'localhost'; // Change to your database host (e.g., '127.0.0.1' or an IP address)
$dbname = 'bsu_fis'; // Change to your database name
$username = 'root'; // Change to your database username
$password = ''; // Change to your database password

try {
    // Create a PDO instance and set error mode to exception
    $dsn = "mysql:host=$host;dbname=$dbname;charset=utf8";
    $pdo = new PDO($dsn, $username, $password);
    
    // Set PDO error mode to exception
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

} catch (PDOException $e) {
    // In case of an error, display the error message
    echo "Connection failed: " . $e->getMessage();
}
?>
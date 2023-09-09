<?php

$host = "localhost"; // Database host
$dbName = "project"; // Database name
$user = "root"; // Database username
$password = ""; // Database password

try {
    $dsn = "mysql:host=$host;dbname=$dbName";
    $pdo = new PDO($dsn, $user, $password);

    // Set PDO error mode to exception
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    // Additional PDO configurations (optional)
    $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
    $pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
    // ...

} catch (PDOException $e) {
    die("Connection failed: " . $e->getMessage());
}
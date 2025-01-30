<?php

$host = 'localhost';
$config_username = 'root';
$password = '';
$dbname = 'gymdb';

try {
    
    $conn = new PDO("mysql:host=$host;dbname=$dbname", $config_username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

} catch (PDOException $e) {
    
    die("Connection failed: " . $e->getMessage());
}


?>
<?php

$DBHost = "localhost";
$DBUser = "root";
$DBPass = "";
$DBName = "projet_devweb";

try {
    $conn = new PDO("mysql:host=$DBHost;dbname=$DBName", $DBUser, $DBPass);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Connected successfully";
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}


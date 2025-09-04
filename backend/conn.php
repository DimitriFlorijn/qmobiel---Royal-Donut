<?php

require_once 'config.php';

$conn = new PDO("mysql:host=$dbHost;dbname=$dbName", $dbUser, $dbPass);
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

if ($conn->connect_error) {
  die("Verbinding mislukt: " . $conn->connect_error);
}
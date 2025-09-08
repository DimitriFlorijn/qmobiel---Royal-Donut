<?php

include "config.php";

$conn = new mysqli($DB_HOST, $DB_USER, $DB_PASS, $DB_NAME);

if ($conn->connect_error) {
    die("Database connectie mislukt: " . $conn->connect_error);
}
?>
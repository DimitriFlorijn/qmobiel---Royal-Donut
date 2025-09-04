<?php
include 'conn.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $seal_of_approval = isset($_POST['seal_of_approval']) ? 1 : 0;
    $price = $_POST['price'];
    $created_at = date('Y-m-d H:i:s');

    $stmt = $conn->prepare("INSERT INTO dingen (name, seal_of_approval, price, created_at) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("sids", $name, $seal_of_approval, $price, $created_at);

    if ($stmt->execute()) {
        echo "Donut succesvol opgeslagen!";
    } else {
        echo "Fout: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}
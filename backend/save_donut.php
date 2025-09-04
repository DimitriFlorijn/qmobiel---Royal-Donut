<?php
include 'conn.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];

    $seal_of_approval = isset($_POST['seal_of_approval']) ? (int)$_POST['seal_of_approval'] : 1;
    if ($seal_of_approval < 1) $seal_of_approval = 1;
    if ($seal_of_approval > 5) $seal_of_approval = 5;

    $price = $_POST['price'];
    $created_at = date('Y-m-d H:i:s');

    $image_path = null;
    if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
        $upload_dir = 'uploads/';
        if (!is_dir($upload_dir)) {
            mkdir($upload_dir, 0755, true);
        }

        $tmp_name = $_FILES['image']['tmp_name'];
        $filename = basename($_FILES['image']['name']);
        $target_file = $upload_dir . time() . '_' . $filename;

       
        $allowed_types = ['image/jpeg', 'image/png', 'image/gif'];
        if (in_array($_FILES['image']['type'], $allowed_types)) {
            if (move_uploaded_file($tmp_name, $target_file)) {
                $image_path = $target_file;
            } else {
                echo "Fout bij het uploaden van de afbeelding.";
                exit;
            }
        } else {
            echo "Ongeldig afbeeldingsformaat. Alleen JPG, PNG en GIF zijn toegestaan.";
            exit;
        }
    }

    $stmt = $conn->prepare("INSERT INTO Donuts (name, seal_of_approval, price, created_at , image_path) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("sids", $name, $seal_of_approval, $price, $created_at);

    if ($stmt->execute()) {
        echo "Donut succesvol opgeslagen!";
    } else {
        echo "Fout: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}
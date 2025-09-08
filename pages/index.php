<?php
include '../backend/conn.php';
session_start();

$message = "";
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'] ?? '';
    $seal_of_approval = $_POST['seal_of_approval'] ?? '';
    $price = $_POST['price'] ?? ''; 
    $created_at = date('Y-m-d H:i:s');
  }

// Haal melding uit sessie
if (isset($_SESSION['success'])) {
    $message = $_SESSION['success'];
    unset($_SESSION['success']);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>homescreen</title>
  <link rel="stylesheet" href="../styling/main.css">
</head>
<body>
  <header>
    <img src="../img/RDLogo.png" alt="RDLogo" style="max-height:80px;">
    <h1>Welcome chef : RoyalDonut Kitchen</h1>
  </header>

  <div class="donuts">
    <h2>Donut overzicht</h2>

    <!-- Melding -->
    <?php if (!empty($message)): ?>
      <div style="padding:10px; background:#d4edda; color:#155724; border:1px solid #c3e6cb; margin-bottom:15px; border-radius:5px;">
        <?= $message ?>
      </div>
    <?php endif; ?>

    <form method="get" style="margin-bottom:10px;">
      <input type="text" name="search" placeholder="Zoek donut..." value="<?= htmlspecialchars($search ?? '') ?>">

      <fieldset>
      <legend>Sorteren op:</legend>
      <label>
        <input type="checkbox" name="sort[]" value="name" <?= isset($sort) && in_array('name', (array)$sort) ? 'checked' : '' ?>>
        Naam
      </label>
      <label>
        <input type="checkbox" name="sort[]" value="price" <?= isset($sort) && in_array('price', (array)$sort) ? 'checked' : '' ?>>
        Prijs
      </label>
      <label>
        | Seal of Approval:
        <select name="seal_of_approval">
          <option value=""> Kies een waarde </option>
          <option value="1" <?= isset($seal_of_approval) && $seal_of_approval == '1' ? 'selected' : '' ?>>1</option>
          <option value="2" <?= isset($seal_of_approval) && $seal_of_approval == '2' ? 'selected' : '' ?>>2</option>
          <option value="3" <?= isset($seal_of_approval) && $seal_of_approval == '3' ? 'selected' : '' ?>>3</option>
          <option value="4" <?= isset($seal_of_approval) && $seal_of_approval == '4' ? 'selected' : '' ?>>4</option>
          <option value="5" <?= isset($seal_of_approval) && $seal_of_approval == '5' ? 'selected' : '' ?>>5</option>
        </select>
      </label>
      <label>
        <input type="checkbox" name="sort[]" value="created_at" <?= isset($sort) && in_array('created_at', (array)$sort) ? 'checked' : '' ?>>
        Datum toegevoegd
      </label>
    </fieldset>

      <select name="order">
        <option value="asc" <?= isset($order) && $order == 'asc' ? 'selected' : '' ?>>Oplopend</option>
        <option value="desc" <?= isset($order) && $order == 'desc' ? 'selected' : '' ?>>Aflopend</option>
      </select>
      <button type="submit">Sorteren / Zoeken</button>
    </form>

    <div class="donut-list">
      <?php if (!empty($desserts)): 
        foreach ($desserts as $dessert): ?>
          <div class="donut-item">
            <h3><?= htmlspecialchars($dessert['name']) ?></h3>
            <p>Prijs: €<?= number_format($dessert['price'], 2) ?></p>
            <p>Seal of Approval: <?= htmlspecialchars($dessert['seal_of_approval']) ?>/5</p>
            <p>Toegevoegd op: <?= htmlspecialchars($dessert['created_at']) ?></p>
          </div>
        <?php endforeach; ?>
      <?php else: ?>
        <p>Geen donuts gevonden.</p>
      <?php endif; ?>
    </div>
  </div>

  <div class="form-container">
    <h2>Nieuwe Donut toevoegen</h2>
    <form action="index.php" method="post" enctype="multipart/form-data">
      <label>Naam:</label><br>
      <input type="text" name="name" required><br><br>

      <label>Seal of Approval (1-5):</label><br>
      <input type="number" name="seal_of_approval" min="1" max="5" required><br><br>

      <label>Prijs (€):</label><br>
      <input type="number" step="0.01" name="price" required><br><br>

      <button type="submit">Opslaan</button>
    </form>
  </div>

  <footer>
    <p>&copy; <?= date("Y"); ?> Dimitri Florijn X Qmobiel test. All rights reserved.</p>
  </footer>
</body>
</html>

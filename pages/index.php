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
    <form method="get" style="margin-bottom:10px;">
      <input type="text" name="search" placeholder="Zoek donut..." value="<?= htmlspecialchars($search ?? '') ?>">
      <select name="sort">
        <option value="name" <?= isset($sort) && $sort == 'name' ? 'selected' : '' ?>>Naam</option>
        <option value="price" <?= isset($sort) && $sort == 'price' ? 'selected' : '' ?>>Prijs</option>
        <option value="seal_of_approval" <?= isset($sort) && $sort == 'seal_of_approval' ? 'selected' : '' ?>>Seal of Approval</option>
        <option value="created_at" <?= isset($sort) && $sort == 'created_at' ? 'selected' : '' ?>>Datum toegevoegd</option>
      </select>
      <select name="order">
        <option value="asc" <?= isset($order) && $order == 'ASC' ? 'selected' : '' ?>>Oplopend</option>
        <option value="desc" <?= isset($order) && $order == 'DESC' ? 'selected' : '' ?>>Aflopend</option>
      </select>
      <button type="submit">Sorteren / Zoeken</button>
    </form>

    <div class="donut-list">
      <?php if (!empty($donuts)): ?>
        <?php foreach ($donuts as $donut): ?>
          <div class="donut-item">
            <h3><?= htmlspecialchars($donut['name']) ?></h3>
            <p>Prijs: €<?= number_format($donut['price'], 2) ?></p>
            <p>Seal of Approval: <?= htmlspecialchars($donut['seal_of_approval']) ?>/5</p>
            <p>Toegevoegd op: <?= htmlspecialchars($donut['created_at']) ?></p>
          </div>
        <?php endforeach; ?>
      <?php else: ?>
        <p>Geen donuts gevonden.</p>
      <?php endif; ?>
    </div>
  </div>

  <div class="form-container">
    <h2>Nieuwe Donut toevoegen</h2>
    <form action="add_donut.php" method="post" enctype="multipart/form-data">
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
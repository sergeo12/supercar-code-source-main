<?php
session_start();
if (!isset($_SESSION['id_users'])) {
    header("Location: ../connexion.php");
    exit;
}

$mysqli = new mysqli("localhost", "root", "", "supercar");
$result = $mysqli->query("SELECT * FROM voitures");
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Liste des voitures</title>
    <link rel="stylesheet" href="../bootstrap.min(2).css">
</head>
<body>
    <h2>Nos voitures disponibles</h2>
    <?php while ($row = $result->fetch_assoc()): ?>
        <div style="border:1px solid #ccc; margin-bottom:15px; padding:10px;">
            <img src="<?= htmlspecialchars($row['image']) ?>" width="200"><br>
            <strong><?= htmlspecialchars($row['nom']) ?></strong><br>
            Prix : <?= htmlspecialchars($row['prix']) ?> €<br>
            Date de fabrication : <?= htmlspecialchars($row['date_fabrication']) ?><br>
            Stock disponible : <?= htmlspecialchars($row['stock']) ?><br>
            <p><?= htmlspecialchars($row['description']) ?></p>
            <a href="acheter.php?id=<?= $row['id'] ?>">Acheter</a>
        </div>
    <?php endwhile; ?>
</body>
</html>

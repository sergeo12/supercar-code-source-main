<?php
session_start();
$conn = new mysqli("localhost", "root", "", "supercar");

if ($conn->connect_error) {
    die("Erreur de connexion : " . $conn->connect_error);
}

// Suppression
if (isset($_GET['supprimer'])) {
    $id = intval($_GET['supprimer']);
    $conn->query("DELETE FROM achat WHERE id = $id");
    header("Location: liste_achat.php");
    exit();
}

// Récupération des achats
$result = $conn->query("SELECT * FROM achats ORDER BY date_achat DESC");
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Liste des Achats</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: #f5f5f5;
        }
        .table-container {
            margin-top: 40px;
        }
        .btn-danger {
            background-color: #e74c3c;
            border: none;
        }
        .btn-danger:hover {
            background-color: #c0392b;
        }
    </style>
</head>
<body>

<nav class="navbar navbar-dark bg-dark px-3">
    <a href="dashboard_admin.php" class="btn btn-outline-light">⬅ Retour</a>
    <span class="navbar-brand mb-0 h1 mx-auto">Liste des Achats</span>
</nav>

<div class="container table-container">
    <table class="table table-striped table-bordered text-center">
        <thead class="table-dark">
            <tr>
                <th>#</th>
                <th>Nom du Véhicule</th>
                <th>Prix</th>
                <th>Description</th>
                <th>Date d'achat</th>
                <th>Image</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
        <?php while ($achat = $result->fetch_assoc()): ?>
            <tr>
                <td><?= $achat['id'] ?></td>
                <td><?= $achat['nom_vehicule'] ?></td>
                <td><?= number_format($achat['prix'], 2, ',', ' ') ?> €</td>
                <td><?= $achat['description'] ?></td>
                <td><?= $achat['date_achat'] ?></td>
                <td>
                    <?php if (!empty($achat['image'])): ?>
                        <img src="<?= $achat['image'] ?>" width="100" alt="voiture">
                    <?php else: ?>
                        Aucune image
                    <?php endif; ?>
                </td>
                <td>
                    <a href="?supprimer=<?= $achat['id'] ?>" class="btn btn-danger" onclick="return confirm('Confirmer la suppression ?')">Supprimer</a>
                </td>
            </tr>
        <?php endwhile; ?>
        </tbody>
    </table>
</div>

</body>
</html>

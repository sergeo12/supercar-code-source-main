<?php
session_start();
$conn = new mysqli("localhost", "root", "", "supercar");

// Vérifie la connexion
if ($conn->connect_error) {
    die("Erreur de connexion : " . $conn->connect_error);
}

// Redirection si l'admin n'est pas connecté
if (!isset($_SESSION["admin_connecte"])) {
    header("Location: ../connexion.php");
    exit();
}

// Suppression d'un utilisateur
if (isset($_GET['supprimer'])) {
    $id = intval($_GET['supprimer']);
    $conn->query("DELETE FROM users WHERE id = $id");
    header("Location: utilisateurs.php");
    exit();
}

// Récupérer tous les utilisateurs
$result = $conn->query("SELECT * FROM users ORDER BY id DESC");
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Utilisateurs - Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-5">
    <h2 class="mb-4 text-center">Liste des utilisateurs inscrits</h2>
    <a href="dashboard_admin.php" class="btn btn-secondary mb-4">⬅ Retour au tableau de bord</a>

    <table class="table table-bordered table-striped">
        <thead class="table-dark">
            <tr>
                <th>ID</th>
                <th>Nom</th>
                <th>Email</th>
                <th>Téléphone</th>
                <th>Adresse</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($user = $result->fetch_assoc()) : ?>
                <tr>
    <td><?= htmlspecialchars($user['id'] ?? '') ?></td>
    <td><?= htmlspecialchars($user['nom'] ?? '') ?></td>
    <td><?= htmlspecialchars($user['email'] ?? '') ?></td>
    <td><?= htmlspecialchars($user['telephone'] ?? '') ?></td>
    <td><?= htmlspecialchars($user['adresse'] ?? '') ?></td>
    <td>
        <a href="?supprimer=<?= $user['id'] ?>" class="btn btn-danger btn-sm">Supprimer</a>
    </td>
</tr>
            <?php endwhile; ?>
        </tbody>
    </table>
</div>

</body>
</html>

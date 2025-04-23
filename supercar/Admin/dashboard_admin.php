<?php
session_start();

// Redirection si l'admin n'est pas connecté
if (!isset($_SESSION["admin_connecte"])) {
    header("Location: ../connexion.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Dashboard Admin - SuperCar</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: #ecf0f1;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        .card {
            transition: transform 0.3s ease;
        }
        .card:hover {
            transform: scale(1.03);
        }
        .header {
            background-color: #2c3e50;
            color: white;
            padding: 20px;
            text-align: center;
        }
        a.card-link {
            text-decoration: none;
            color: inherit;
        }
    </style>
</head>
<body>

<div class="header">
    <h2>Bienvenue Admin sur le Tableau de Bord SuperCar</h2>
    <a href="../deconnexion.php" class="btn btn-danger mt-3">Se déconnecter</a>
</div>

<div class="container my-5">
    <div class="row g-4">
        <div class="col-md-4">
            <a href="vehicule.php" class="card-link">
                <div class="card border-primary h-100">
                    <div class="card-body text-center">
                        <h4 class="card-title">🚗 Gérer les véhicules</h4>
                        <p class="card-text">Ajouter, modifier ou supprimer des véhicules électriques.</p>
                    </div>
                </div>
            </a>
        </div>

        <div class="col-md-4">
            <a href="utilisateurs.php" class="card-link">
                <div class="card border-success h-100">
                    <div class="card-body text-center">
                        <h4 class="card-title">👥 Gérer les utilisateurs</h4>
                        <p class="card-text">Voir tous les utilisateurs inscrits et les supprimer si besoin.</p>
                    </div>
                </div>
            </a>
        </div>

        <div class="col-md-4">
            <a href="liste_achat.php" class="card-link">
                <div class="card border-warning h-100">
                    <div class="card-body text-center">
                        <h4 class="card-title">🧾 Liste des achats</h4>
                        <p class="card-text">Afficher tous les achats réalisés sur le site.</p>
                    </div>
                </div>
            </a>
        </div>
    </div>
</div>

</body>
</html>

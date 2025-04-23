<?php
session_start();
require_once '../connect_ddb.php'; // ajuste ce chemin selon l'emplacement de ton fichier de connexion

// Connexion à la base de données
$conn = new mysqli("localhost", "root", "", "supercar");

if ($conn->connect_error) {
    die("Erreur de connexion : " . $conn->connect_error);
}

if (isset($_POST['nom'], $_POST['prix'], $_POST['image'], $_POST['description'])) {
    $nom = htmlspecialchars($_POST['nom']);
    $prix = htmlspecialchars($_POST['prix']);
    $image = htmlspecialchars($_POST['image']);
    $description = htmlspecialchars($_POST['description']);

    // Récupérer l'identité de l'utilisateur connecté
    $users = isset($_SESSION['user_email']) ? $_SESSION['user_email'] : 'Invité';

    // Requête pour insérer l'achat
    $stmt = $conn->prepare("INSERT INTO achats (nom_vehicule, prix, image, description, id_users, date_achat) VALUES (?, ?, ?, ?, ?, NOW())");
    $stmt->bind_param("sdsss", $nom, $prix, $image, $description, $utilisateur);

    $achat_enregistre = $stmt->execute();

    $stmt->close();
    $conn->close();
} else {
    echo "❌ Données d'achat incomplètes.";
    exit;
}
?>

<!-- Affichage de confirmation -->
<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <title>Confirmation d'achat</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <style>
    body {
      font-family: Arial;
      text-align: center;
      padding: 50px;
      background: #e6ffe6;
    }
    h1 {
      color: green;
    }
  </style>
</head>
<body>
  <?php if ($achat_enregistre): ?>
    <h1>✅ Achat confirmé !</h1>
    <p>Merci pour votre achat. Vous recevrez bientôt votre véhicule électrique.</p>
    <a href="vehicule.php">Retour à la boutique</a>
  <?php else: ?>
    <h1>❌ Une erreur est survenue</h1>
    <p>Votre achat n'a pas pu être enregistré. Veuillez réessayer plus tard.</p>
    <a href="vehicule.php">Retour à la boutique</a>
  <?php endif; ?>
</body>
</html>

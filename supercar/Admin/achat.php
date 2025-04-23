<?php
// Vérifie les infos passées en GET
if (!isset($_GET['nom'], $_GET['prix'], $_GET['image'], $_GET['description'])) {
    echo "Informations du véhicule manquantes.";
    exit;
}

$nom = htmlspecialchars($_GET['nom']);
$prix = htmlspecialchars($_GET['prix']);
$image = htmlspecialchars($_GET['image']);
$description = htmlspecialchars($_GET['description']);
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Confirmer l'achat</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f0f0f0;
            padding: 30px;
        }
        .container {
            max-width: 700px;
            margin: auto;
            background: white;
            padding: 25px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        img {
            width: 100%;
            border-radius: 10px;
        }
        h2 {
            margin-top: 0;
        }
        p {
            margin: 10px 0;
        }
        form {
            margin-top: 20px;
        }
        button {
            padding: 12px 20px;
            background-color: #4CAF50;
            border: none;
            color: white;
            font-size: 16px;
            border-radius: 5px;
            cursor: pointer;
        }
        button:hover {
            background-color: #388E3C;
        }
    </style>
</head>
<body>

<div class="container">
    <h2>Confirmation de l'achat du véhicule</h2>
    <img src="<?= $image ?>" alt="<?= $nom ?>">
    <p><strong>Nom :</strong> <?= $nom ?></p>
    <p><strong>Description :</strong> <?= $description ?></p>
    <p><strong>Prix :</strong> <?= $prix ?> €</p>

    <form action="confirmation.php" method="post">
        <input type="hidden" name="nom" value="<?= $nom ?>">
        <input type="hidden" name="prix" value="<?= $prix ?>">
        <input type="hidden" name="image" value="<?= $image ?>">
        <input type="hidden" name="description" value="<?= $description ?>">

        <button type="submit">Confirmer l'achat</button>
    </form>
</div>

</body>
</html>

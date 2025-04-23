<?php
session_start();
$mysqli = new mysqli("localhost", "root", "", "supercar");

if ($mysqli->connect_error) {
    die("Erreur de connexion : " . $mysqli->connect_error);
}

$message = '';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $nom = trim($_POST['nom']);
    $email = trim($_POST['email']);
    $mot_de_passe = trim($_POST['mot_de_passe']);
    $telephone = trim($_POST['telephone']);
    $adresse = trim($_POST['adresse']);

    if (empty($nom) || empty($email) || empty($mot_de_passe) || empty($telephone) || empty($adresse)) {
        $message = "Veuillez remplir tous les champs.";
    } else {
        $stmt = $mysqli->prepare("SELECT id FROM users WHERE email = ?");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $stmt->store_result();

        if ($stmt->num_rows > 0) {
            $message = "Un compte avec cet email existe déjà.";
        } else {
            $stmt = $mysqli->prepare("INSERT INTO users (nom, email, mot_de_passe, telephone, adresse) VALUES (?, ?, ?, ?, ?)");
            $stmt->bind_param("sssss", $nom, $email, $mot_de_passe, $telephone, $adresse);

            if ($stmt->execute()) {
                $message = "Inscription réussie. <a href='connexion.php'>Cliquez ici pour vous connecter</a>";
            } else {
                $message = "Erreur lors de l'inscription.";
            }
        }

        $stmt->close();
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Inscription - SuperCar</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(to right, #2c3e50, #3498db);
            color: white;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        .card {
            margin-top: 80px;
            background-color: white;
            color: #333;
            border-radius: 10px;
            box-shadow: 0 4px 20px rgba(0,0,0,0.2);
        }
        .btn-primary {
            background-color: #3498db;
            border: none;
        }
        .btn-primary:hover {
            background-color: #2980b9;
        }
    </style>
</head>
<body>

<nav class="navbar navbar-dark bg-dark">
    <div class="container">
        <a class="navbar-brand" href="index.php">SuperCar</a>
    </div>
</nav>

<div class="container d-flex justify-content-center">
    <div class="card p-4 col-md-6">
        <h3 class="text-center mb-4">Inscription</h3>

        <?php if (!empty($message)): ?>
            <div class="alert alert-info"><?= $message ?></div>
        <?php endif; ?>

        <form method="POST">
            <div class="mb-3">
                <label for="nom" class="form-label">Nom</label>
                <input type="text" class="form-control" id="nom" name="nom" required>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Adresse Email</label>
                <input type="email" class="form-control" id="email" name="email" required>
            </div>
            <div class="mb-3">
                <label for="mot_de_passe" class="form-label">Mot de passe</label>
                <input type="password" class="form-control" id="mot_de_passe" name="mot_de_passe" required>
            </div>
            <div class="mb-3">
                <label for="telephone" class="form-label">Téléphone</label>
                <input type="text" class="form-control" id="telephone" name="telephone" required>
            </div>
            <div class="mb-3">
                <label for="adresse" class="form-label">Adresse</label>
                <input type="text" class="form-control" id="adresse" name="adresse" required>
            </div>
            <button type="submit" class="btn btn-primary w-100">S'inscrire</button>
        </form>

        <div class="mt-3 text-center">
            <p>Déjà un compte ? <a href="connexion.php">Connectez-vous ici</a></p>
        </div>
    </div>
</div>

</body>
</html>

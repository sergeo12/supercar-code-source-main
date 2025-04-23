<?php
session_start();
$conn = new mysqli("localhost", "root", "", "supercar");

if ($conn->connect_error) {
    die("Erreur de connexion : " . $conn->connect_error);
}

$message = "";

// Connexion
if (isset($_POST['email']) && isset($_POST['mot_de_passe'])) {
    $email = trim($_POST["email"]);
    $mot_de_passe = trim($_POST["mot_de_passe"]);

    // Debug : affichage des infos saisies
    // var_dump($email, $mot_de_passe); exit;

    // Vérification admin
    $stmt_admin = $conn->prepare("SELECT * FROM admin WHERE email = ? AND mot_de_passe = ?");
    $stmt_admin->bind_param("ss", $email, $mot_de_passe);
    $stmt_admin->execute();
    $result_admin = $stmt_admin->get_result();

    if ($result_admin && $result_admin->num_rows === 1) {
        $_SESSION["admin_connecte"] = true;
        $_SESSION["admin_email"] = $email;
        header("Location: Admin/dashboard_admin.php");
        exit();
    }

    // Vérification client
    $stmt_user = $conn->prepare("SELECT * FROM users WHERE email = ? AND mot_de_passe = ?");
    $stmt_user->bind_param("ss", $email, $mot_de_passe);
    $stmt_user->execute();
    $result_user = $stmt_user->get_result();

    if ($result_user && $result_user->num_rows === 1) {
        $client = $result_user->fetch_assoc();
        $_SESSION["client_connecte"] = true;
        $_SESSION["nom"] = $client["nom"];
        $_SESSION["email"] = $client["email"];
        header("Location: Admin/vehicule.php");
        exit();
    } else {
        $message = "Identifiants incorrects ou non reconnus.";
    }
}
?>



<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Connexion - SuperCar</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(to right, #2c3e50, #3498db);
            color: #fff;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            min-height: 100vh;
        }
        .card {
            margin-top: 80px;
            background-color: #ffffff;
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
        .logo {
            font-size: 24px;
            font-weight: bold;
            color: white;
            text-decoration: none;
        }
        .logo:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>

<nav class="navbar navbar-dark bg-dark">
    <div class="container d-flex justify-content-start">
        <a href="index.php" class="btn btn-outline-light me-3">⬅ Retour</a>
        <span class="navbar-brand mb-0 h1">SuperCar</span>
    </div>
</nav>

<div class="container d-flex justify-content-center">
    <div class="card p-4 col-12 col-md-6 col-lg-5">
        <h3 class="text-center mb-4">Connexion</h3>

        <?php if (!empty($message)): ?>
            <div class="alert alert-danger"><?= $message ?></div>
        <?php endif; ?>

        <form method="POST">
            <div class="mb-3">
                <label for="email" class="form-label">Adresse email</label>
                <input type="email" class="form-control" id="email" name="email" required>
            </div>
            <div class="mb-3">
                <label for="mot_de_passe" class="form-label">Mot de passe</label>
                <input type="password" class="form-control" id="mot_de_passe" name="mot_de_passe" required>
            </div>
            <button type="submit" class="btn btn-primary w-100">Se connecter</button>
        </form>

        <div class="mt-3 text-center">
            <p>Vous n'avez pas encore de compte ? <a href="inscription.php">Inscrivez-vous ici</a></p>
        </div>
    </div>
</div>

</body>
</html>

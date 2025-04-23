<?php
session_start(); // Démarre la session

// Chemin du dossier des images
$dossierImages = 'images/';

// Récupère la liste des fichiers dans le dossier images
$listeImages = scandir($dossierImages);

// Filtrer les fichiers pour ne prendre que les images (extensions autorisées)
$listeImages = array_filter($listeImages, function ($fichier) {
    $extensionsAutorisees = ['jpg', 'jpeg', 'png', 'gif'];
    $extension = pathinfo($fichier, PATHINFO_EXTENSION);
    return in_array(strtolower($extension), $extensionsAutorisees);
});

// Traitement du formulaire
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["img1"]) && isset($_POST["img2"])) {
        $img1 = $_POST["img1"];
        $img2 = $_POST["img2"];
        $img3 = $_POST["img3"];

        // Stocke les valeurs dans la session
        $_SESSION['selected_image'] = $img1;
        $_SESSION['selected_image_2'] = $img2;
        $_SESSION['selected_image_3'] = $img3;

        echo "Vous avez sélectionné l'image 1 : $img1<br>";
        echo "Vous avez sélectionné l'image 2 : $img2 <br>";
        echo "Vous avez sélectionné l'image 3 : $img3 ";
    } else {
        echo "Veuillez sélectionner les deux images.";
    }
}
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title>SELECT IMAGE ACCUEIL</title>
    <!-- Ajoutez vos balises meta, liens CSS, etc. ici -->
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #C6D3F3;
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        h2 {
            text-align: center;
            color: red;
        }

        form {
            max-width: 400px;
            margin: 20px auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        label {
            display: block;
            margin-bottom: 8px;
            color: #333;
            font-weight: bold;
        }

        select {
            width: 100%;
            padding: 8px;
            margin-bottom: 16px;
            box-sizing: border-box;
        }

        input[type="submit"] {
            background-color: #4caf50;
            color: #fff;
            padding: 10px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #45a049;
        }

        /* Ajoutez d'autres styles au besoin */
    </style>
</head>

<body>

    <nav class="navbar navbar-light navbar-expand-md sticky-top bg-dark bg-gradient border-dark navbar-shrink py-3" id="mainNav" style="height: 69.5938px;">
        <div class="container">
            <div class="collapse navbar-collapse" id="navcol-1">
                <ul class="navbar-nav text-bg-light border rounded border-2 border-danger shadow mx-auto">
                    <li class="nav-item"><a class="nav-link" href="../User/showUser.php">Liste Utilisateurs</a></li>
                    <li class="nav-item"><a class="nav-link" href="../Formulaire/message.php">Messages</a></li>
                    <li class="nav-item"><a class="nav-link active" href="test.php">Image Accueil</a></li>
                    <li class="nav-item"><a class="nav-link active" href="index.php">Ajouter Photo</a></li>
                    <!-- Bouton de déconnexion -->
                    <li class="nav-item"><a class="nav-link" href="../formConne/logout.php">Déconnexion</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <h2>Sélection d'images</h2>

    <!-- Formulaire HTML avec un seul bouton "Valider" -->
    <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        <label for="img1">Sélectionnez la première image :</label>
        <select name="img1" id="img1">
            <?php
            foreach ($listeImages as $image) {
                echo "<option value='$image'>$image</option>";
            }
            ?>
        </select>
        <br>
        <label for="img2">Sélectionnez la deuxième image :</label>
        <select name="img2" id="img2">
            <?php
            foreach ($listeImages as $image) {
                echo "<option value='$image'>$image</option>";
            }
            ?>
        </select>
        <br>
        <label for="img3">Sélectionnez la troisième image :</label>
        <select name="img3" id="img3">
            <?php
            foreach ($listeImages as $image) {
                echo "<option value='$image'>$image</option>";
            }
            ?>
        </select>
        <br>
        <div style="text-align: center;">
            <input type="submit" value="Valider">
        </div>

    </form>

    <!-- Ajoutez d'autres éléments HTML au besoin -->

</body>

</html>

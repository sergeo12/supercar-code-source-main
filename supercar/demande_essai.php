<?php
    // details base de donnée
    $host = "localhost";
    $username = "root";
    $password = "";
    $dbname = "supercar";

    // créer la connexion
    $con = mysqli_connect($host, $username, $password, $dbname);

    // assurer que la connexion à été établie 
    if (!$con) {
        die("Connection failed!" . mysqli_connect_error());
    }

    // fermer la connexion
    mysqli_close($con);
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Demande d'essai</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" href="assets/css/Supercar1.css">
</head>

<body>
      <nav class="navbar navbar-light navbar-expand-md sticky-top navbar-shrink py-3" id="mainNav">
       <div class="container"><a class="navbar-brand d-flex align-items-center"><strong>Greencar</strong></a>
                <ul class="navbar-nav mx-auto">
                    <li class="nav-item"><a class="nav-link" href="index.php">Accueil</a></li>
                    <li class="nav-item"><a class="nav-link" href="services.php">Services</a></li>
                    <li class="nav-item"><a class="nav-link" href="voitures.php">Voitures</a></li>
                    <li class="nav-item"><a class="nav-link active" href="demande_essai.php">Demande d'essai</a></li>
                    <li class="nav-item"><a class="nav-link" href="contact.php">Contact</a></li>
                </ul><a class="btn btn-primary shadow" role="button" href="connexion.php">Connexion</a>
            </div>
        </div>
    </nav>
    <section class="py-5">
        <div class="container py-5">
                <div class="col-md-8 col-xl-6 text-center mx-auto">
                    <h2 class="fw-bold">Faite votre demande</h2>
					</div>
                </div>
            </div>
            <div class="row d-flex justify-content-center">
                <div class="col-md-6 col-xl-4">
                    <div>
                        <form class="p-3 p-xl-4" method="post">
                            <div class="mb-3"><input class="form-control" type="text" id="nom" name="nom" placeholder="Nom"></div>
                            <div class="mb-3"><input class="form-control" type="email" id="email-1" name="email" placeholder="Email"></div>
							<div class="mb-3"><input class="form-control" type="tel" id="tel" name="telephone" placeholder="Téléphone"></div>
							<div class="mb-3"><input class="form-control" type="text" id="text" name="voiture" placeholder="voiture"></div>
							<div class="mb-3"><input class="form-control" type="date" id="date" name="date" placeholder="Date de l'essai"></div>
                            <div class="mb-3"><input class="form-control" type="time" id="heure" name="heure" placeholder="heure de l'essai"></div>
							<div><button class="btn btn-primary shadow d-block w-100" type="submit">Envoyer</button></div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/bold-and-bright.js"></script>
</body>

</html>
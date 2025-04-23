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
    <title>Services</title>
     <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" href="assets/css/Supercar1.css">
</head>

<body>
  <nav class="navbar navbar-light navbar-expand-md sticky-top navbar-shrink py-3" id="mainNav">
       <div class="container"><a class="navbar-brand d-flex align-items-center"><strong>Greencar</strong></a>
                <ul class="navbar-nav mx-auto">
                    <li class="nav-item"><a class="nav-link" href="index.php">Accueil</a></li>
                    <li class="nav-item"><a class="nav-link active" href="services.php">Services</a></li>
                    <li class="nav-item"><a class="nav-link" href="voitures.php">Voitures</a></li>
                    <li class="nav-item"><a class="nav-link" href="demande_essai.php">Demande d'essai</a></li>
                    <li class="nav-item"><a class="nav-link" href="contact.php">Contact</a></li>
                </ul><a class="btn btn-primary shadow" role="button" href="connexion.php">Connexion</a>
        </div>
    </nav>
    <section class="py-5">
        <div class="container py-5">
            <div class="row mb-4 mb-lg-5">
                <div class="col-md-8 col-xl-6 text-center mx-auto">
                    <h3 class="fw-bold">Nos services</h3>
                </div>
            </div>
            <div class="row row-cols-1 row-cols-md-2 mx-auto" style="max-width: 900px;">
                <div class="col mb-5"><img class="rounded img-fluid shadow" src="OIP.jpg"></div>
                <div class="col d-md-flex align-items-md-end align-items-lg-center mb-5">
                    <div>
                        <h5 class="fw-bold">Assurance automobile</h5>
                        <p class="text-muted mb-4">Découvrez une tranquillité d'esprit sur la route avec notre assurance automobile complète et flexible. ont vous permet de trouver rapidement des solutions personnalisées pour protéger votre véhicule.</p><button class="btn btn-primary shadow" type="button">Savoir plus</button>
                    </div>
                </div>
            </div>
            <div class="row row-cols-1 row-cols-md-2 mx-auto" style="max-width: 900px;">
                <div class="col order-md-last mb-5"><img class="rounded img-fluid shadow" src="car-shipping.jpg"></div>
                <div class="col d-md-flex align-items-md-end align-items-lg-center mb-5">
                    <div>
                        <h5 class="fw-bold">Crédit Automobile</h5>
                        <p class="text-muted mb-4">Réalisez votre rêve de posséder la voiture de vos rêves grâce à notre crédit automobile flexible et avantageux</p><button class="btn btn-primary shadow" type="button">Savoir plus</button>
                    </div>
                </div>
            </div>
            <div class="row row-cols-1 row-cols-md-2 mx-auto" style="max-width: 900px;">
                <div class="col mb-5"><img class="rounded img-fluid shadow" src="home-cotes.jpg"></div>
                <div class="col d-md-flex align-items-md-end align-items-lg-center mb-5">
                    <div></div>
                    <div></div>
                    <div>
                        <h5 class="fw-bold">Cote Automobile</h5>
                        <p class="text-muted mb-4">Découvrez la vraie valeur de votre véhicule grâce à notre service de cote automobile précis et fiable.</p><button class="btn btn-primary shadow" type="button">Savoir plus</button>
                    </div>
                </div>
            </div>
            <div class="row row-cols-1 row-cols-md-2 mx-auto" style="max-width: 900px;">
                <div class="col mb-5"><img class="rounded img-fluid shadow" src="financement.jpg"></div>
                <div class="col d-md-flex align-items-md-end align-items-lg-center mb-5">
                    <div></div>
                    <div>
                        <h5 class="fw-bold">Financement Auto</h5>
                        <p class="text-muted mb-4">Découvrez une nouvelle manière simple et efficace de financer votre prochaine voiture avec notre service de financement automobile.</p><button class="btn btn-primary shadow" type="button">Savoir plus</button>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/bold-and-bright.js"></script>
</body>

</html>
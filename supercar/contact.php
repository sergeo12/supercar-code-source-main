<?php
session_start();
$bdd = new PDO('mysql:host=localhost;dbname=supercar;charset=utf8', 'root', '');
if (isset($_POST['submit'])) {
	if (!empty($_POST['nom']) &&!empty($_POST['email']) &&!empty($_POST['commentaire'])){
			$nom = $_POST['nom'];
			$email = $_POST['email'];
			$commentaire = $_POST['commentaire'];
			$insertUser = $bdd->prepare('INSERT INTO contact(nom, email, commentaire) VALUES(:nom, :email, :commentaire)');
			$insertUser->execute(array(':nom' => $nom, ':email' => $email, ':commentaire' => $commentaire));
			
			// Confirm that the data has been saved
			echo "Votre message à bien été envoyé.";
			
			/* $recupUser = $bdd->prepare('SELECT * FROM serveuid WHERE nom =? && prenom =? fonction =? mairie =? email =? pwd =?');
			$recupUser->execute(array($nom, $prenom, $fonction, $mairie, $email, $pwd));
			if ($recupUser->rowCount() > 0){ */
			/*$_SESSION['nom'] = $nom;
			$_SESSION['prenom'] = $prenom;
			header('Location: espace_personnel.php');
			
			echo $_SESSION['nom'] = $nom;
			echo '<br/>';
			echo $_SESSION['prenom'] = $prenom;*/
			
	}
	else {
		echo "Veuillez compléter tous les champs...";
	}
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Contacts</title>
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
                    <li class="nav-item"><a class="nav-link" href="demande_essai.php">Demande d'essai</a></li>
                    <li class="nav-item"><a class="nav-link active" href="contact.php">Contact</a></li>
                </ul><a class="btn btn-primary shadow" role="button" href="connexion.php">Connexion</a>
            </div>
        </div>
    </nav>
    <section class="py-5" style="padding-top: 5px;margin-top: -48px;">
        <div class="container py-5">
            <div class="row mb-5">
                <div class="col-md-8 col-xl-6 text-center mx-auto" style="margin-top: 12px;padding-top: 44px;">
                    <h2 class="fw-bold" style="margin-top: -46px;">Laissez-nous un message :</h2>
                </div>
            </div>
            <div class="row d-flex justify-content-center">
                <div class="col-md-6 col-xl-4">
                    <div>
                        <form class="p-3 p-xl-4" method="post">
                            <div class="mb-3"><input class="form-control" type="text" id="nom" name="nom" placeholder="Nom"></div>
                            <div class="mb-3"><input class="form-control" type="email" id="email" name="email" placeholder="Email"></div>
                            <div class="mb-3"><textarea class="form-control" id="commentaire" name="commentaire" rows="6" placeholder="Commentaire"></textarea></div>
                            <div><button class="btn btn-primary shadow d-block w-100" type="submit" name="submit">Envoyer</button></div>
                        </form>
                    </div>
                </div>
                <div class="col-md-4 col-xl-4 d-flex justify-content-center justify-content-xl-start">
                    <div class="d-flex flex-wrap flex-md-column justify-content-md-start align-items-md-start h-100">
                        <div class="d-flex align-items-center p-3">
                            <div class="bs-icon-md bs-icon-circle bs-icon-primary shadow d-flex flex-shrink-0 justify-content-center align-items-center d-inline-block bs-icon bs-icon-md"><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" viewBox="0 0 16 16" class="bi bi-telephone">
                                </svg></div>
                            <div class="px-2">
                                <h6 class="fw-bold mb-0">Téléphone</h6>
                                <p class="text-muted mb-0">+123456789</p>
                            </div>
                        </div>
                        <div class="d-flex align-items-center p-3">
                            <div class="bs-icon-md bs-icon-circle bs-icon-primary shadow d-flex flex-shrink-0 justify-content-center align-items-center d-inline-block bs-icon bs-icon-md"><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" viewBox="0 0 16 16" class="bi bi-envelope">
                                </svg></div>
                            <div class="px-2">
                                <h6 class="fw-bold mb-0">Email</h6>
                                <p class="text-muted mb-0">Supercar@example.com</p>
                            </div>
                        </div>
                        <div class="d-flex align-items-center p-3">
                            <div class="bs-icon-md bs-icon-circle bs-icon-primary shadow d-flex flex-shrink-0 justify-content-center align-items-center d-inline-block bs-icon bs-icon-md"><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" viewBox="0 0 16 16" class="bi bi-pin">
                                </svg></div>
                            <div class="px-2">
                                <h6 class="fw-bold mb-0">Adresse</h6>
                                <p class="text-muted mb-0">12 Quatres Street</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <footer class="bg-primary-gradient">
        <div class="container py-4 py-lg-5">
            <div class="row justify-content-center">
                <div class="col-sm-4 col-md-3 text-center text-lg-start d-flex flex-column"></div>
                <div class="col-sm-4 col-md-3 text-center text-lg-start d-flex flex-column"></div>
                <div class="col-sm-4 col-md-3 text-center text-lg-start d-flex flex-column"></div>
                <div class="col-lg-3 text-center text-lg-start d-flex flex-column align-items-center order-first align-items-lg-start order-lg-last">
                    <div class="fw-bold d-flex align-items-center mb-2"></div>
                </div>
            </div>
        </div>
    </footer>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/bold-and-bright.js"></script>
</body>

</html>
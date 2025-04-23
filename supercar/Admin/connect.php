<?php session_start(); 
$bdd = new PDO('mysql:host=localhost;dbname=supercar;charset=utf8', 'root', ''); 
if (isset($_POST['submit'])) 
	{ if (!empty($_POST['login']) &&!empty($_POST['password'])) 
		{ $login = htmlspecialchars(trim($_POST['login'])); 
			$password = htmlspecialchars(trim($_POST['password']));
			$recupUser = $bdd->prepare('SELECT * FROM admin WHERE login = :login AND password = :password'); 
			$recupUser->execute(['login' => $login, 'password' => $password]); 
			if ($recupUser->rowCount() > 0) {
				$_SESSION['login'] = $login; 
				$_SESSION['password'] = $password; 
				echo "Vos identifiants sont correct."; 
				header('Location: admin.php'); 
			} 
				
			else { 
				echo "Vos identifiants sont incorrect."; 
			}
			
		} 
			else { 
			echo "Veuillez compléter tous les champs..."; 
			} 
			} 
			
?>
<!DOCTYPE html> 
<html lang="fr"> 
	<head> 
		<meta charset="utf-8"> 
			<meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no"> 
			<title>Connect</title> 
			<link rel="stylesheet" href="style.css">

</head> 
	<body> 
			<main class="page login-page"> 
	<section class="clean-block clean-form dark"> 
		<div class="container"> <div class="block-heading"> 
			<h2 class="text-info">Connectez-vous</h2>
		</div> 
			<form method="POST"> 
			<div class="mb-3"><label class="form-label" for="login">Identifiant</label><input class="form-control" type="text" id="login" name="login"></div> 
			<div class="mb-3"><label class="form-label" for="password">Mot de passe</label><input class="form-control" type="password" id="password" name="password"></div> 
			<div class="mb-3"><button class="btn btn-primary" type="submit" name="submit">Connexion</button></div> </form> </div> 
	</section> 
			</main>
	</body> 
</html>
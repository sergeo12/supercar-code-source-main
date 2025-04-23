<?php
session_start();

// Check if the log off button has been clicked
if (isset($_POST['logoff'])) {
    // Clear the session variables
    unset($_SESSION['login']);
    unset($_SESSION['password']);

    // Destroy the session
    session_destroy();

    // Redirect to the login page
    header('Location: connect.php');
    exit;
}

// Check if the user is not logged in
if (!isset($_SESSION['login']) || !isset($_SESSION['password'])) {
    // Redirect to the login page
    header('Location: connect.php');
    exit;
}
?>


<!DOCTYPE html>
<html>
<head>
	<title>Admin page</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
	<h1>Admin page</h1>
	<ul class="navbar-nav mx-auto">
                    <li class="nav-item"><a class="nav-link" href="addUser.php">Ajouter utilisateur</a></li>
                   <!-- <li class="nav-item"><a class="nav-link" href="deleteUser.php">Supprimer utilisateur</a></li>-->
                    <li class="nav-item"><a class="nav-link" href="showUser.php">Montrer utilisateur</a></li>
                    <li class="nav-item"><a class="nav-link" href="message.php">Contact/Message</a></li>
                </ul>
	<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
    <input type="submit" name="logoff" value="Déconnexion">
</form>
</body>
</html>
<?php
session_start();
session_destroy(); // Détruit toutes les données de session

// Rediriger vers la page de connexion
header("Location: connexion.php");
exit();

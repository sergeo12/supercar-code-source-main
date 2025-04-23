<?php
// Connexion à la base de données
$serveur = "localhost";
$utilisateur = "root";
$mot_de_passe = "";
$base_de_donnees = "supercar";
 
$con = mysqli_connect($serveur, $utilisateur, $mot_de_passe, $base_de_donnees);
 
// Vérifier la connexion
if (!$con) {
    die("Erreur de connexion : " . mysqli_connect_error());
}
 
// Récupérer le mot-clé de la barre de recherche
$mot_cle = $_GET['mot_cle'];
 
// Requête SQL pour rechercher les produits
$sql = "SELECT * FROM voiture WHERE marque LIKE '%$mot_cle%'";
$resultat = mysqli_query($con, $sql);
 
// Afficher les résultats
if (mysqli_num_rows($resultat) > 0) {
    while ($row = mysqli_fetch_assoc($resultat)) {
        echo "marque : " . $row['marque'] . "<br>";
    }
} else {
    echo "Aucun résultat trouvé pour ce mot-clé.";
}
 
// Fermer la connexion
mysqli_close($con);
?>





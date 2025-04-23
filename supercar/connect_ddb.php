<?php
$host = "localhost";
$username = "root";
$password = "";
$dbname = "supercar";

$con = mysqli_connect($host, $username, $password, $dbname);
if (!$con) {
    die("Connexion échouée : " . mysqli_connect_error());
}


?>

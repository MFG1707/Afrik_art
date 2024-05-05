<?php
// Paramètres de connexion à la base de données
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "ARTSHOP";

// Connexion à la base de données
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Vérification de la connexion
if (!$conn) {
//    die("Connexion à la base de données impossible : " . mysqli_connect_error());
}

//echo "Connexion à la base de données réussie !";

// Fermeture de la connexion
mysqli_close($conn);
?>

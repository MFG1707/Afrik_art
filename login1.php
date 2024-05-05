<?php
session_start();

// Paramètres de connexion à la base de données
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "ARTSHOP";

// Connexion à la base de données
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Vérification de la connexion
if (!$conn) {
    die("Connexion à la base de données impossible : " . mysqli_connect_error());
}

// Récupération des données du formulaire
$email = mysqli_real_escape_string($conn, $_POST['email']);
$password = mysqli_real_escape_string($conn, $_POST['password']);

// Requête SQL pour récupérer l'utilisateur correspondant à l'email et au mot de passe
$sql = "SELECT * FROM users WHERE email='$email' AND password='$password' LIMIT 1";
$result = mysqli_query($conn, $sql);

// Vérification du résultat de la requête
if (mysqli_num_rows($result) == 1) {
    // Utilisateur trouvé
    $row = mysqli_fetch_assoc($result);

    // Enregistrement de l'utilisateur en session
    $_SESSION['user'] = $row['username'];
    $_SESSION['type'] = $row['type'];

    // Redirection vers la page appropriée en fonction du type d'utilisateur
    if ($_SESSION['type'] == "admin") {
        session_start();
        $_SESSION['username'] = $row['username'];
        header("Location: admin/template/index.html");
        exit();
    } else {
        header("Location: index.php");
        exit();
    }
} else {
    // Utilisateur non trouvé, retour à la page de login avec un message d'erreur
    $_SESSION['error'] = "Email ou mot de passe incorrect.";
    header("Location: login.php");
    exit();
}

// Fermeture de la connexion
mysqli_close($conn);
?>

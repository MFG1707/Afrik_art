<?php
// Connexion à la base de données MySQL
$host = "localhost"; // Adresse de la base de données
$username = "root"; // Nom d'utilisateur de la base de données
$password = "root"; // Mot de passe de la base de données
$dbname = "ARTSHOP"; // Nom de la base de données

$conn = new mysqli($host, $username, $password, $dbname);
if ($conn->connect_error) {
    die("La connexion à la base de données a échoué: " . $conn->connect_error);
}

// Récupération des données du formulaire
$username = $_POST['username'];
$email = $_POST['email'];
$password = $_POST['password'];

// Vérification de l'unicité de l'email
$sql = "SELECT * FROM users WHERE email='$email'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // L'email existe déjà dans la base de données
    header('Location: register.php?error=1'); // Redirection vers la page d'inscription avec un message d'erreur
} else {
    // Insertion des données dans la table 'users'
    $sql = "INSERT INTO users (username, email, password) VALUES ('$username', '$email', '$password')";
    if ($conn->query($sql) === TRUE) {
        // L'inscription a réussi
        header('Location: login.php'); // Redirection vers la page de connexion
    } else {
        // Une erreur s'est produite lors de l'insertion des données
        echo "Erreur: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>

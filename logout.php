<?php
session_start();

// Déconnexion de la session
session_unset();
session_destroy();

// Redirection vers la page de connexion
header('Location: login.php');
exit();
?>

<?php
// Démarrer la session
session_start();

// Vérifier si l'ID du produit est spécifié dans la requête
if(isset($_GET['id'])) {
    $id = $_GET['id'];

    // Vérifier si le panier existe déjà dans la session
    if(!isset($_SESSION['panier'])) {
        $_SESSION['panier'] = array();
    }

    // Vérifier si le produit est déjà dans le panier
    if(isset($_SESSION['panier'][$id])) {
        // Incrémenter la quantité du produit
        $_SESSION['panier'][$id]++;
    } else {
        // Ajouter le produit au panier avec une quantité de 1
        $_SESSION['panier'][$id] = 1;
    }
}

// Rediriger vers la page d'où provient la requête
header('Location: ' . $_SERVER['HTTP_REFERER']);
exit;
?>

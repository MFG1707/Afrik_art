<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">

    <title>Afrik Art - Produits</title>


    <!-- Additional CSS Files -->
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">

    <link rel="stylesheet" type="text/css" href="assets/css/font-awesome.css">

    <link rel="stylesheet" href="assets/css/templatemo-hexashop.css">

    <link rel="stylesheet" href="assets/css/owl-carousel.css">

    <link rel="stylesheet" href="assets/css/lightbox.css">
<!--

TemplateMo 571 Hexashop

https://templatemo.com/tm-571-hexashop

-->
    </head>
    
    <body>
    
    <!-- ***** Preloader Start ***** -->
    <div id="preloader">
        <div class="jumper">
            <div></div>
            <div></div>
            <div></div>
        </div>
    </div>  
    <!-- ***** Preloader End ***** -->
    
    <!-- ***** Header Area Start ***** -->
    <header class="header-area header-sticky">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <nav class="main-nav">
                        <!-- ***** Logo Start ***** -->
                        <a href="index.php" class="logo">
                            <img src="assets/images/logo.png" alt="Image" style="width:100px;height:100px">
                        </a>
                        <!-- ***** Logo End ***** -->
                        <!-- ***** Menu Start ***** -->
                        <ul class="nav">
                            
                            
                            <li class="scroll-to-section"><a href="#men">Tableaux</a></li>
                            <li class="scroll-to-section"><a href="#women">Sculptures</a></li>
                            <li class="scroll-to-section"><a href="#kids">Vases</a></li>
                            <li class="scroll-to-section"><a href="#lampes">Lampes</a></li>
                            <li class="scroll-to-section"><a href="#ustensiles">Ustensiles </a></li>
                            <li class="scroll-to-section"><a href="#tables">Tables </a></li>

                            <li class="submenu">
                                <a href="javascript:;">Pages</a>
                                <ul>
                                    <li><a href="about.php">A propos</a></li>
                                    <li><a href="products.php">Produits</a></li>
                                    <li><a href="panier.php">Votre panier</a></li>
                                    <li><a href="contact.php">Contactez-nous</a></li>
                                </ul>
                            </li>
                            <li class="submenu">
                                <a href="javascript:;">Identifiez-vous</a>
                                <ul>
                                    <li><a href="login.php">Connexion</a></li>
                                    <li><a href="register.php">Inscription</a></li>
                                    
                                </ul>
                            </li>
                           
                            <li class="submenu">
                                <img src="assets/images/logo-user.png" alt="Image" style="width:30px;height:30px" backgroundcolour="white">
                                <ul>
                                    <li>
                                        <a href="javascript:;">
                                        <form action="logout.php" method="post">
                                                <button type="submit">Déconnexion</button>
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        </ul>        
                        <a class='menu-trigger'>
                            <span>Menu</span>
                        </a>
                        <!-- ***** Menu End ***** -->
                    </nav>
                </div>
            </div>
        </div>
    </header>
    <!-- ***** Header Area End ***** -->
     
    <!-- ***** Main Banner Area Start ***** -->
    <div class="page-heading" id="top">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="inner-content">
                        <h2>Jetez un oeil à nos produits</h2>
                        <span>Chaque objet est fabriqué avec soin pour capturer l'essence de l'art africain</span> 
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ***** Main Banner Area End ***** -->

<!-- ***** Tableaux Area Starts ***** -->
<section class="section" id="men">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="section-heading">
                        <h2>Nos tableaux</h2>
                        <span></span>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="men-item-carousel">
                        <div class="owl-men-item owl-carousel">
                        <?php
                                // Connexion à la base de données
                                $conn = mysqli_connect("localhost", "root", "root", "ARTSHOP");

                                // Vérifier la connexion
                                if (!$conn) {
                                    die("Connection failed: " . mysqli_connect_error());
                                }

                                // Récupérer les données des produits à afficher (id_produit de 1 à 7)
                                $sql = "SELECT * FROM produits WHERE id BETWEEN 1 AND 7";
                                $result = mysqli_query($conn, $sql);

                                // Vérifier si des produits ont été trouvés
                                if(mysqli_num_rows($result) > 0) {
                                    while($row = mysqli_fetch_assoc($result)) {
                                        // Récupérer les données du produit
                                        $id_produit = $row['id'];
                                        $nom = $row['nom'];
                                        $description = $row['description'];
                                        $prix = $row['prix'];
                                        $stock = $row['stock'];
                                        $image = $row['image']; // Colonne contenant l'image dans la base de données

                                        // Afficher la fiche produit
                                        echo '<div class="item">';
                                        echo '<div class="thumb">';
                                        echo '<div class="hover-content">';
                                        echo '<ul>';
                                        echo '<li><a href="tableau' . $id_produit . '.php?id_produit=' . $id_produit . '"><i class="fa fa-eye"></i></a></li>';
                                        echo '<li><a href="ajouter_panier.php?id_produit=' . $id_produit . '"><i class="fa fa-shopping-cart"></i></a></li>';
                                        echo '</ul>';
                                        echo '</div>';

                                        // Vérifier le type d'image et définir l'en-tête Content-type approprié
                                        $imageType = exif_imagetype($image);
                                        if ($imageType == IMAGETYPE_JPEG) {
                                            header("Content-type: image/jpeg");
                                        } elseif ($imageType == IMAGETYPE_PNG) {
                                            header("Content-type: image/png");
                                        } elseif ($imageType == IMAGETYPE_JPG) {
                                            header("Content-type: image/jpg");
                                        } elseif ($imageType == IMAGETYPE_GIF) {
                                            header("Content-type: image/gif");
                                        } // Ajoutez d'autres conditions pour les autres formats d'image pris en charge

                                        // Affichage de l'image à partir des données binaires (BLOB) en utilisant l'encodage base64
                                        echo '<img src="data:image/png;base64,' . base64_encode($image) . '" alt="Image" >';

                                        echo '</div>';
                                        echo '<div class="down-content">';
                                        echo '<h4>' . $nom . '</h4>';
                                        echo '<span>$' . $prix . '</span>';
                                        echo '<ul class="stars">';
                                        echo '<li><i class="fa fa-star"></i></li>';
                                        echo '<li><i class="fa fa-star"></i></li>';
                                        echo '<li><i class="fa fa-star"></i></li>';
                                        echo '<li><i class="fa fa-star"></i></li>';
                                        echo '<li><i class="fa fa-star"></i></li>';
                                        echo '</ul>';
                                        echo '</div>';
                                        echo '</div>';
                                    }
                                } else {
                                    echo 'Aucun produit trouvé.';
                                }

                                // Fermer la connexion
                                mysqli_close($conn);
                                ?>


                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ***** Tableaux Area Ends ***** -->

    <!-- ***** Sculptures Area Starts ***** -->
    <section class="section" id="women">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="section-heading">
                        <h2>Nos sculptures</h2>
                        <span></span>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="men-item-carousel">
                        <div class="owl-women-item owl-carousel">
                           
                        <?php
                                // Connexion à la base de données
                                $conn = mysqli_connect("localhost", "root", "root", "ARTSHOP");

                                // Vérifier la connexion
                                if (!$conn) {
                                    die("Connection failed: " . mysqli_connect_error());
                                }

                                // Récupérer les données des produits à afficher (id_produit de 8 à 28 )
                                $sql = "SELECT * FROM produits WHERE id BETWEEN 8 AND 28";
                                $result = mysqli_query($conn, $sql);

                                // Vérifier si des produits ont été trouvés
                                if(mysqli_num_rows($result) > 0) {
                                    while($row = mysqli_fetch_assoc($result)) {
                                        // Récupérer les données du produit
                                        $id_produit = $row['id'];
                                        $nom = $row['nom'];
                                        $description = $row['description'];
                                        $prix = $row['prix'];
                                        $stock = $row['stock'];
                                        $image = $row['image']; // Colonne contenant l'image dans la base de données

                                        // Afficher la fiche produit
                                        echo '<div class="item">';
                                        echo '<div class="thumb">';
                                        echo '<div class="hover-content">';
                                        echo '<ul>';
                                        echo '<li><a href="sculpture' . $id_produit . '.php?id_produit=' . $id_produit . '"><i class="fa fa-eye"></i></a></li>';
                                        echo '<li><a href="ajouter_panier.php?id_produit=' . $id_produit . '"><i class="fa fa-shopping-cart"></i></a></li>';
                                        echo '</ul>';
                                        echo '</div>';

                                        // Vérifier le type d'image et définir l'en-tête Content-type approprié
                                        $imageType = exif_imagetype($image);
                                        if ($imageType == IMAGETYPE_JPEG) {
                                            header("Content-type: image/jpeg");
                                        } elseif ($imageType == IMAGETYPE_PNG) {
                                            header("Content-type: image/png");
                                        } elseif ($imageType == IMAGETYPE_GIF) {
                                            header("Content-type: image/gif");
                                        } // Ajoutez d'autres conditions pour les autres formats d'image pris en charge

                                        // Affichage de l'image à partir des données binaires (BLOB) en utilisant l'encodage base64
                                        echo '<img src="data:image/png;base64,' . base64_encode($image) . '" alt="Image" style="width:100px;height:250px">';

                                        echo '</div>';
                                        echo '<div class="down-content">';
                                        echo '<h4>' . $nom . '</h4>';
                                        echo '<span>$' . $prix . '</span>';
                                        echo '<ul class="stars">';
                                        echo '<li><i class="fa fa-star"></i></li>';
                                        echo '<li><i class="fa fa-star"></i></li>';
                                        echo '<li><i class="fa fa-star"></i></li>';
                                        echo '<li><i class="fa fa-star"></i></li>';
                                        echo '<li><i class="fa fa-star"></i></li>';
                                        echo '</ul>';
                                        echo '</div>';
                                        echo '</div>';
                                    }
                                } else {
                                    echo 'Aucun produit trouvé.';
                                }

                                // Fermer la connexion
                                mysqli_close($conn);
                                ?>

                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ***** Statuettes Area Ends ***** -->

    <!-- ***** Vases Area Starts ***** -->
    <section class="section" id="kids">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="section-heading">
                        <h2>Nos vases</h2>
                        <span></span>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="kid-item-carousel">
                        <div class="owl-kid-item owl-carousel">
                        <?php
                                // Connexion à la base de données
                                $conn = mysqli_connect("localhost", "root", "root", "ARTSHOP");

                                // Vérifier la connexion
                                if (!$conn) {
                                    die("Connection failed: " . mysqli_connect_error());
                                }

                                // Récupérer les données des produits à afficher (id_produit de 29 à 36)
                                $sql = "SELECT * FROM produits WHERE id BETWEEN 29 AND 36";
                                $result = mysqli_query($conn, $sql);

                                // Vérifier si des produits ont été trouvés
                                if(mysqli_num_rows($result) > 0) {
                                    while($row = mysqli_fetch_assoc($result)) {
                                        // Récupérer les données du produit
                                        $id_produit = $row['id'];
                                        $nom = $row['nom'];
                                        $description = $row['description'];
                                        $prix = $row['prix'];
                                        $stock = $row['stock'];
                                        $image = $row['image']; // Colonne contenant l'image dans la base de données

                                        // Afficher la fiche produit
                                        echo '<div class="item">';
                                        echo '<div class="thumb">';
                                        echo '<div class="hover-content">';
                                        echo '<ul>';
                                        echo '<li><a href="vase' . $id_produit . '.php?id_produit=' . $id_produit . '"><i class="fa fa-eye"></i></a></li>';
                                        echo '<li><a href="ajouter_panier.php?id_produit=' . $id_produit . '"><i class="fa fa-shopping-cart"></i></a></li>';
                                        echo '</ul>';
                                        echo '</div>';

                                        // Vérifier le type d'image et définir l'en-tête Content-type approprié
                                        $imageType = exif_imagetype($image);
                                        if ($imageType == IMAGETYPE_JPEG) {
                                            header("Content-type: image/jpeg");
                                        } elseif ($imageType == IMAGETYPE_PNG) {
                                            header("Content-type: image/png");
                                        } elseif ($imageType == IMAGETYPE_GIF) {
                                            header("Content-type: image/gif");
                                        } // Ajoutez d'autres conditions pour les autres formats d'image pris en charge

                                        // Affichage de l'image à partir des données binaires (BLOB) en utilisant l'encodage base64
                                        echo '<img src="data:image/png;base64,' . base64_encode($image) . '" alt="Image" style="width:230px;height:220px">';

                                        echo '</div>';
                                        echo '<div class="down-content">';
                                        echo '<h4>' . $nom . '</h4>';
                                        echo '<span>$' . $prix . '</span>';
                                        echo '<ul class="stars">';
                                        echo '<li><i class="fa fa-star"></i></li>';
                                        echo '<li><i class="fa fa-star"></i></li>';
                                        echo '<li><i class="fa fa-star"></i></li>';
                                        echo '<li><i class="fa fa-star"></i></li>';
                                        echo '<li><i class="fa fa-star"></i></li>';
                                        echo '</ul>';
                                        echo '</div>';
                                        echo '</div>';
                                    }
                                } else {
                                    echo 'Aucun produit trouvé.';
                                }

                                // Fermer la connexion
                                mysqli_close($conn);
                                ?>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ***** Vases Area Ends ***** -->

     <!-- ***** Lampes Area Starts ***** -->
    <section class="section" id="lampes">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="section-heading">
                        <h2>Nos lampes</h2>
                        <span></span>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="women-item-carousel">
                        <div class="owl-women-item owl-carousel">
                        <?php
                                // Connexion à la base de données
                                $conn = mysqli_connect("localhost", "root", "root", "ARTSHOP");

                                // Vérifier la connexion
                                if (!$conn) {
                                    die("Connection failed: " . mysqli_connect_error());
                                }

                                // Récupérer les données des produits à afficher (id_produit de 37 à 42)
                                $sql = "SELECT * FROM produits WHERE id BETWEEN 37 AND 42";
                                $result = mysqli_query($conn, $sql);

                                // Vérifier si des produits ont été trouvés
                                if(mysqli_num_rows($result) > 0) {
                                    while($row = mysqli_fetch_assoc($result)) {
                                        // Récupérer les données du produit
                                        $id_produit = $row['id'];
                                        $nom = $row['nom'];
                                        $description = $row['description'];
                                        $prix = $row['prix'];
                                        $stock = $row['stock'];
                                        $image = $row['image']; // Colonne contenant l'image dans la base de données

                                        // Afficher la fiche produit
                                        echo '<div class="item">';
                                        echo '<div class="thumb">';
                                        echo '<div class="hover-content">';
                                        echo '<ul>';
                                        echo '<li><a href="lampe' . $id_produit . '.php?id_produit=' . $id_produit . '"><i class="fa fa-eye"></i></a></li>';
                                        echo '<li><a href="ajouter_panier.php?id_produit=' . $id_produit . '"><i class="fa fa-shopping-cart"></i></a></li>';
                                        echo '</ul>';
                                        echo '</div>';

                                        // Vérifier le type d'image et définir l'en-tête Content-type approprié
                                        $imageType = exif_imagetype($image);
                                        if ($imageType == IMAGETYPE_JPEG) {
                                            header("Content-type: image/jpeg");
                                        } elseif ($imageType == IMAGETYPE_PNG) {
                                            header("Content-type: image/png");
                                        } elseif ($imageType == IMAGETYPE_GIF) {
                                            header("Content-type: image/gif");
                                        } // Ajoutez d'autres conditions pour les autres formats d'image pris en charge

                                        // Affichage de l'image à partir des données binaires (BLOB) en utilisant l'encodage base64
                                        echo '<img src="data:image/png;base64,' . base64_encode($image) . '" alt="Image" style="width:230px;height:320px">';

                                        echo '</div>';
                                        echo '<div class="down-content">';
                                        echo '<h4>' . $nom . '</h4>';
                                        echo '<span>$' . $prix . '</span>';
                                        echo '<ul class="stars">';
                                        echo '<li><i class="fa fa-star"></i></li>';
                                        echo '<li><i class="fa fa-star"></i></li>';
                                        echo '<li><i class="fa fa-star"></i></li>';
                                        echo '<li><i class="fa fa-star"></i></li>';
                                        echo '<li><i class="fa fa-star"></i></li>';
                                        echo '</ul>';
                                        echo '</div>';
                                        echo '</div>';
                                    }
                                } else {
                                    echo 'Aucun produit trouvé.';
                                }

                                // Fermer la connexion
                                mysqli_close($conn);
                                ?>

                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ***** Lampes Area Ends ***** -->

    <!-- ***** Ustensiles Area Starts ***** -->
    <section class="section" id="ustensiles">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="section-heading">
                        <h2>Nos ustensiles de cuisines</h2>
                        <span></span>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="women-item-carousel">
                        <div class="owl-women-item owl-carousel">
                        <?php
                                // Connexion à la base de données
                                $conn = mysqli_connect("localhost", "root", "root", "ARTSHOP");

                                // Vérifier la connexion
                                if (!$conn) {
                                    die("Connection failed: " . mysqli_connect_error());
                                }

                                // Récupérer les données des produits à afficher (id_produit de 43 à 60)
                                $sql = "SELECT * FROM produits WHERE id BETWEEN 43 AND 60";
                                $result = mysqli_query($conn, $sql);

                                // Vérifier si des produits ont été trouvés
                                if(mysqli_num_rows($result) > 0) {
                                    while($row = mysqli_fetch_assoc($result)) {
                                        // Récupérer les données du produit
                                        $id_produit = $row['id'];
                                        $nom = $row['nom'];
                                        $description = $row['description'];
                                        $prix = $row['prix'];
                                        $stock = $row['stock'];
                                        $image = $row['image']; // Colonne contenant l'image dans la base de données

                                        // Afficher la fiche produit
                                        echo '<div class="item">';
                                        echo '<div class="thumb">';
                                        echo '<div class="hover-content">';
                                        echo '<ul>';
                                        echo '<li><a href="ustensile' . $id_produit . '.php?id_produit=' . $id_produit . '"><i class="fa fa-eye"></i></a></li>';
                                        echo '<li><a href="ajouter_panier.php?id_produit=' . $id_produit . '"><i class="fa fa-shopping-cart"></i></a></li>';
                                        echo '</ul>';
                                        echo '</div>';
                                        echo '<img src="data:image/png;base64,' . base64_encode($image) . '" alt="Image" style="width:230px;height:300px">'; // Affichage de l'image à partir des données binaires (BLOB) en utilisant l'encodage base64

                                        echo '</div>';
                                        echo '<div class="down-content">';
                                        echo '<h4>' . $nom . '</h4>';
                                        echo '<span>$' . $prix . '</span>';
                                        echo '<ul class="stars">';
                                        echo '<li><i class="fa fa-star"></i></li>';
                                        echo '<li><i class="fa fa-star"></i></li>';
                                        echo '<li><i class="fa fa-star"></i></li>';
                                        echo '<li><i class="fa fa-star"></i></li>';
                                        echo '<li><i class="fa fa-star"></i></li>';
                                        echo '</ul>';
                                        echo '</div>';
                                        echo '</div>';
                                    }
                                } else {
                                    echo 'Aucun produit trouvé.';
                                }

                                // Fermer la connexion
                                mysqli_close($conn);
                                ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ***** Ustensiles Area Ends ***** -->

    <!-- ***** Tables Area Starts ***** -->
     <section class="section" id="tables">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="section-heading">
                        <h2>Tables</h2>
                        <span></span>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="kid-item-carousel">
                        <div class="owl-kid-item owl-carousel">
                        <?php
                                // Connexion à la base de données
                                $conn = mysqli_connect("localhost", "root", "root", "ARTSHOP");

                                // Vérifier la connexion
                                if (!$conn) {
                                    die("Connection failed: " . mysqli_connect_error());
                                }

                                // Récupérer les données des produits à afficher (id_produit de 60 à 66)
                                $sql = "SELECT * FROM produits WHERE id BETWEEN 60 AND 66 ";
                                $result = mysqli_query($conn, $sql);

                                // Vérifier si des produits ont été trouvés
                                if(mysqli_num_rows($result) > 0) {
                                    while($row = mysqli_fetch_assoc($result)) {
                                        // Récupérer les données du produit
                                        $id_produit = $row['id'];
                                        $nom = $row['nom'];
                                        $description = $row['description'];
                                        $prix = $row['prix'];
                                        $stock = $row['stock'];
                                        $image = $row['image']; // Colonne contenant l'image dans la base de données

                                        // Afficher la fiche produit
                                        echo '<div class="item">';
                                        echo '<div class="thumb">';
                                        echo '<div class="hover-content">';
                                        echo '<ul>';
                                        echo '<li><a href="table' . $id_produit . '.php?id_produit=' . $id_produit . '"><i class="fa fa-eye"></i></a></li>';
                                        echo '<li><a href="ajouter_panier.php?id_produit=' . $id_produit . '"><i class="fa fa-shopping-cart"></i></a></li>';
                                        echo '</ul>';
                                        echo '</div>';
                                        echo '<img src="data:image/png;base64,' . base64_encode($image) . '" alt="Image" style="width:300px;height:250px">'; // Affichage de l'image à partir des données binaires (BLOB) en utilisant l'encodage base64

                                        echo '</div>';
                                        echo '<div class="down-content">';
                                        echo '<h4>' . $nom . '</h4>';
                                        echo '<span>$' . $prix . '</span>';
                                        echo '<ul class="stars">';
                                        echo '<li><i class="fa fa-star"></i></li>';
                                        echo '<li><i class="fa fa-star"></i></li>';
                                        echo '<li><i class="fa fa-star"></i></li>';
                                        echo '<li><i class="fa fa-star"></i></li>';
                                        echo '<li><i class="fa fa-star"></i></li>';
                                        echo '</ul>';
                                        echo '</div>';
                                        echo '</div>';
                                    }
                                } else {
                                    echo 'Aucun produit trouvé.';
                                }

                                // Fermer la connexion
                                mysqli_close($conn);
                                ?>
                        
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ***** Tables Area Ends ***** -->
    
   <!-- ***** Footer Start ***** -->
   <footer>
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="first-item">
                        <div class="logo">
                            <img src="assets/images/white-logo.png">
                        </div>
                        <ul>
                            <li><a href="#">16501 Collins Ave, Sunny Isles Beach, FL 33160, United States</a></li>
                            <li><a href="#">hexashop@company.com</a></li>
                            <li><a href="#">010-020-0340</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-3">
                    <h4> Categories</h4>
                    <ul>
                        <li class="scroll-to-section"></li>><a href="index.php#men">Tableaux</a></li>
                        <li class="scroll-to-section"></li>><a href="index.php#women">Statuettes</a></li>
                        <li class="scroll-to-section"></li>><a href="index.php#kids">Vases</a></li>
                        <li class="scroll-to-section"></li>><a href="index.php#masques">Masques</a></li>
                    </ul>
                </div>
                <div class="col-lg-3">
                    <h4>Liens utiles</h4>
                    <ul>
                        <li><a href="index.php">Accueil</a></li>
                        <li><a href="about.php">A propos </a></li>
                        <li><a href="contact.php">Contactez-nous</a></li>
                    </ul>
                </div>
               
                <div class="col-lg-12">
                    <div class="under-footer">
                        <p>Copyright © , Ltd. All Rights Reserved. 
                        
                        <br>Design: 

                        <br>Distributed By: 
                        <ul>
                            <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                            <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                            <li><a href="#"><i class="fa fa-behance"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    

    <!-- jQuery -->
    <script src="assets/js/jquery-2.1.0.min.js"></script>

    <!-- Bootstrap -->
    <script src="assets/js/popper.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>

    <!-- Plugins -->
    <script src="assets/js/owl-carousel.js"></script>
    <script src="assets/js/accordions.js"></script>
    <script src="assets/js/datepicker.js"></script>
    <script src="assets/js/scrollreveal.min.js"></script>
    <script src="assets/js/waypoints.min.js"></script>
    <script src="assets/js/jquery.counterup.min.js"></script>
    <script src="assets/js/imgfix.min.js"></script> 
    <script src="assets/js/slick.js"></script> 
    <script src="assets/js/lightbox.js"></script> 
    <script src="assets/js/isotope.js"></script> 
    
    <!-- Global Init -->
    <script src="assets/js/custom.js"></script>

    <script>

        $(function() {
            var selectedClass = "";
            $("p").click(function(){
            selectedClass = $(this).attr("data-rel");
            $("#portfolio").fadeTo(50, 0.1);
                $("#portfolio div").not("."+selectedClass).fadeOut();
            setTimeout(function() {
              $("."+selectedClass).fadeIn();
              $("#portfolio").fadeTo(50, 1);
            }, 500);
                
            });
        });

    </script>

  </body>
</html>

<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">


    <title>Afrik Art - Votre panier</title>


    <!-- Additional CSS Files -->
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">

    <link rel="stylesheet" type="text/css" href="assets/css/font-awesome.css">

    <link rel="stylesheet" href="assets/css/templatemo-hexashop.css">

    <link rel="stylesheet" href="assets/css/owl-carousel.css">

    <link rel="stylesheet" href="assets/css/lightbox.css">

    
	<link rel="stylesheet" type="text/css" href="style.css">
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
                            <li class="scroll-to-section"><a href="index.php" class="active">Accueil</a></li>
                            <li class="scroll-to-section"><a href="index.php#men">Tableaux</a></li>
                            <li class="scroll-to-section"><a href="index.php#women">Statuettes</a></li>
                            <li class="scroll-to-section"><a href="index.php#kids">Vases</a></li>
                            <li class="scroll-to-section"><a href="index.php#masques">Masques</a></li>
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
                        <h2>Regardez votre panier</h2>
                        <span>Vous avez fait de beaux choix, validez-les</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ***** Main Banner Area End ***** -->


    <!-- ***** Product Area Starts ***** -->
    <section class="section" id="product">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                <div class="left-images">
                <?php
                        // Inclure le fichier de configuration de la base de données
                        include('config.php');

                        // Vérifier si un bouton modifier ou supprimer a été cliqué
                        if(isset($_POST['modifier'])){
                            // Mettre à jour la quantité de l'article dans le panier
                            $_SESSION['cart_items'][$_POST['id']]['quantite'] = $_POST['quantite'];
                        }
                        if(isset($_POST['supprimer'])){
                            // Supprimer l'article du panier
                            unset($_SESSION['cart_items'][$_POST['id']]);
                        }
                        ?>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="right-content">
                   
                        <?php
                            // Vérifier si le panier est vide ou non
                            if(empty($_SESSION['cart_items'])){
                                echo "<p>Votre panier est vide.</p>";
                            }else{
                                // Afficher les détails des articles dans le panier
                                foreach($_SESSION['cart_items'] as $id => $value){
                                    // Récupérer les informations de l'article à partir de la base de données
                                    $sql = "SELECT * FROM produits WHERE id = $id";
                                    $result = mysqli_query($conn, $sql);
                                    $row = mysqli_fetch_assoc($result);

                                    // Afficher les détails de l'article avec son image
                                    echo "<div class='produit'>";
                                    echo "<img src='assets/images/".$row['image']."' alt='".$row['nom']."' />";
                                    echo "<p>".$row['nom']."</p>";
                                    echo "<p>Prix : ".$row['prix']." €</p>";

                                    // Ajouter des boutons pour modifier ou supprimer l'article
                                    echo "<form action='panier.php' method='post'>";
                                    echo "<input type='hidden' name='id' value='".$row['id']."' />";
                                    echo "<label for='quantite'>Quantité :</label>";
                                    echo "<input type='number' name='quantite' value='".$value['quantite']."' min='1' />";
                                    echo "<input type='submit' name='modifier' value='Modifier' />";
                                    echo "<input type='submit' name='supprimer' value='Supprimer' />";
                                    echo "</form>";

                                    echo "</div>";
                                }

                                // Afficher le total du panier
                                $total = 0;
                                foreach($_SESSION['cart_items'] as $id => $value){
                                    // Récupérer les informations de l'article à partir de la base de données
                                    $sql = "SELECT * FROM produits WHERE id = $id";
                                    $result = mysqli_query($conn, $sql);
                                    $row = mysqli_fetch_assoc($result);

                                    // Calculer le prix total de l'article en fonction de sa quantité
                                    $prix_total = $row['prix'] * $value['quantite'];
                                    $total += $prix_total;
                                }
                                echo "<p>Total : ".$total." €</p>";
                            }
                            ?>

	                        <a href="products.php">Retourner au catalogue</a>
                </div>
            </div>
            </div>
        </div>
    </section>
    <!-- ***** Product Area Ends ***** -->
    
   <!-- ***** Footer Start ***** -->
   <footer>
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="first-item">
                        <div class="logo">
                            <img src="assets/images/white-logo.png" alt="Image" style="width:100px;height:100px">
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
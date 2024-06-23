<?php
    include "includes/functions.php";

    try
    {
        $bdd = new PDO('mysql:host=localhost;dbname=slam-site_streaming_devoir', 'root', '');
    }
    catch(PDOException $e) {
        die("erreur de connexion");
    }
    session_start();
    //echo $_SESSION['date_fin'];
    if (isset($_SESSION['profil'])) {
        $now = time();
        $date2 = strtotime($_SESSION['date_fin']);
        $decompte = dateDiff($now, $date2);
        echo 'Temps restant avant la fin de l abonement : ';
        echo $decompte['day'] . ' jour(s) ';
        echo $decompte['hour']. ' heure(s) ';
        echo $decompte['minute']. ' minute(s) ';
        echo $decompte['second']. ' seconde(s) ';

        if ($decompte['day'] <= 0 && $decompte['hour'] <= 0 && $decompte['minute'] <= 0 && $decompte['second'] <= 0) {
            $requete = $bdd->prepare("DELETE FROM users WHERE id_u = :id_utilisateur");
            $requete->bindParam(':id_utilisateur', $_SESSION['idutilisateur']);
            $requete->execute();
        }
    } 
    
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>StreamFlix</title>
    <link rel="shortcut icon" href="assets/images/fav.jpg">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/fontawsom-all.min.css">
    <link rel="stylesheet" href="assets/css/animate.css">
    <link rel="stylesheet" type="text/css" href="assets/css/style.css">
</head>

<body>

    <!--####################### Header Starts Here ###################-->
    <header class="container-fluid">
        <div class="header-top">
            <div class="container">
                <div class="row col-det">
                    <div class="col-lg-6 d-none d-lg-block">
                        <ul class="ulleft">
                            <li><i class="far fa-envelope"></i> streamflix@gmail.com</li>
                        </ul>
                    </div>
                    <div class="col-lg-6 col-md-12">
                        <ul class="ulright">
                            <li><i class="fas fa-user"></i>
                                <?php
                                if (!isset($_SESSION['profil'])) {
                                    echo '<a href="login.php">Se Connecter</a></li>';
                                } else {
                                    echo '<a href="logout.php">Se Déconnecter</a></li>';
                                }
                                ?>
                            <?php
                                // Vérifier si l'utilisateur est un admin et afficher le bouton "Admin" si c'est le cas
                                if (isset($_SESSION['profil'])) {
                                    if ($_SESSION['profil'] === 2) {
                                    echo '<li><a href="admin.php">Admin</a></li>';
                                    echo '<li><a href="ajouter.php">Ajouter un film</a></li>';
                                }}
                            ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <div class="header-bottom">
            <div class="container">
                <div class="row nav-row align-items-center">
                    <div class="col-md-3 logo text-center">
                        <img src="https://t3.ftcdn.net/jpg/04/23/92/78/360_F_423927894_T9UIBqoqC1XOwLXlYa8j38VyxLUxO8ii.jpg" alt="Logo">
                    </div>
                    <div class="col-md-9 nav-col">
                        <nav class="navbar navbar-expand-lg navbar-light">

                            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
                                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                                <span class="navbar-toggler-icon"></span>
                            </button>
                            <div class="container text-center">
                                <div class="menu">
                                    <div class="row align-items-start">
                                        <div class="col-md-6">
                                            <h3><a href="index.php">Accueil</a></h3>
                                        </div>
                                        <div class="col-md-6">
                                            <h3><a href="videos.php">Vidéos</a></h3>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!--####################### Header Ends Here ###################-->
</body>

</html>


<?php
    require "includes/header.php";//appel du header
?>

<!-- ************************* Page Title Starts Here ************************** -->
<div class="page-nav no-margin row">
    <div class="container">
        <div class="row">
            <h2>Les catégories</h2>
        </div>
    </div>
</div>

<br>

<div class="container">
    <div class="row">
        <div class="col"><a href="#science-fiction">Science-Fiction</a></div>
        <div class="col"><a href="#action">Action</a></div>
        <div class="col"><a href="#aventure">Aventure</a></div>
        <div class="col"><a href="#horreur">Horreur</a></div>
        <div class="col"><a href="#western">Western</a></div>
    </div>
</div>

<br>

<?php 
$sql = 'SELECT * FROM film where id_c = 1';
?>
<div id="science-fiction" class="container-fluid">
    <div class="container">
        <div class="row video-title no-margin">
            <h6><i class="fas fa-book"></i> Science-Fiction</h6>
        </div>
        <div class="video-row row">
            <?php
            foreach ($bdd->query($sql) as $row) {
                echo '
                <div class="col-lg-3 col-md-4 col-sm-6">
                    <div class="video-card">
                    <a href="film.php?id=' . $row['id_f'] . '" target="_blank">
                    <img src="'.$row['image_f'].'" style="width: 200px; height: 300px;" alt="'.$row['nom_f'].'">
                    </a>
                        <div class="row details no-margin">
                            <h6>'. $row['nom_f'] .'</h6>
                        </div>
                    </div>
                </div>';
            }
            ?>
        </div>
    </div>
</div>

<?php
$sql = 'SELECT * FROM film where id_c = 2';
?>
<div id="action" class="container-fluid">
    <div class="container">
        <div class="row video-title no-margin">
            <h6><i class="fas fa-book"></i> Action</h6>
        </div>
        <div class="video-row row">
            <?php
            foreach ($bdd->query($sql) as $row) {
                echo '
                <div class="col-lg-3 col-md-4 col-sm-6">
                    <div class="video-card">
                    <a href="film.php?id=' . $row['id_f'] . '" target="_blank">
            <img src="'.$row['image_f'].'" style="width: 200px; height: 300px;" alt="'.$row['nom_f'].'">
            </a>
                        <div class="row details no-margin">
                            <h6>'. $row['nom_f'] .'</h6>
                        </div>
                    </div>
                </div>';
            }
            ?>
        </div>
    </div>
</div>

<?php
$sql = 'SELECT * FROM film where id_c = 3';
?>
<div id="aventure" class="container-fluid">
    <div class="container">
        <div class="row video-title no-margin">
            <h6><i class="fas fa-book"></i> Aventure</h6>
        </div>
        <div class="video-row row">
            <?php
            foreach ($bdd->query($sql) as $row) {
                echo '
                <div class="col-lg-3 col-md-4 col-sm-6">
                    <div class="video-card">
                    <a href="film.php?id=' . $row['id_f'] . '" target="_blank">
                    <img src="'.$row['image_f'].'" style="width: 200px; height: 300px;" alt="'.$row['nom_f'].'">
                    </a>
                        <div class="row details no-margin">
                            <h6>'. $row['nom_f'] .'</h6>
                        </div>
                    </div>
                </div>';
            }
            ?>
        </div>
    </div>
</div>

<?php
$sql = 'SELECT * FROM film where id_c = 4';
?>
<div id="horreur" class="container-fluid">
    <div class="container">
        <div class="row video-title no-margin">
            <h6><i class="fas fa-book"></i> Horreur</h6>
        </div>
        <div class="video-row row">
            <?php
            foreach ($bdd->query($sql) as $row) {
                echo '
                <div class="col-lg-3 col-md-4 col-sm-6">
                    <div class="video-card">
                    <a href="film.php?id=' . $row['id_f'] . '" target="_blank">
                    <img src="'.$row['image_f'].'" style="width: 200px; height: 300px;" alt="'.$row['nom_f'].'">
                    </a>
                        <div class="row details no-margin">
                            <h6>'. $row['nom_f'] .'</h6>
                        </div>
                    </div>
                </div>';
            }
            ?>
        </div>
    </div>
</div>

<?php
$sql = 'SELECT * FROM film where id_c = 5';
?>
<div id="western" class="container-fluid">
    <div class="container">
        <div class="row video-title no-margin">
            <h6><i class="fas fa-book"></i> Western</h6>
        </div>
        <div class="video-row row">
            <?php
            foreach ($bdd->query($sql) as $row) {
                echo '
                <div class="col-lg-3 col-md-4 col-sm-6">
                    <div class="video-card">
                    <a href="film.php?id=' . $row['id_f'] . '" target="_blank">
                    <img src="'.$row['image_f'].'" style="width: 200px; height: 300px;" alt="'.$row['nom_f'].'">
                    </a>
                        <div class="row details no-margin">
                            <h6>'. $row['nom_f'] .'</h6>
                        </div>
                    </div>
                </div>';
            }
            ?>
        </div>
    </div>
</div>  

<?php
        require "includes/footer.php";
?>
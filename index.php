<?php
    require "includes/header.php";//appel du header
?>
<?php
$sql = 'SELECT * FROM film';
?>

<!--####################### Trending Starts Here ###################-->
<div class="treanding-video container-fluid">
    <div class="container">
        <div class="row video-title no-margin">
            <h6>
                <i class="fas fa-book"></i>
                Recommandations</h6>
        </div>
        <div class="video-row row">
            <?php
            foreach ($bdd->query($sql) as $row) {
            echo '<div class="col-lg-3 col-md-4 col-sm-6">
                <div class="video-card">
                '?><?php if (isset($_SESSION['profil'])) {
                    echo '<a href="film.php?id=' . $row['id_f'] . '" target="_blank">';
                } ?> <?php
                echo '
                    
                    <img src="'.$row['image_f'].'" style="width: 200px; height: 300px;" alt="'.$row['nom_f'].'">

                        <div class="row details no-margin">
                            <h6>'. $row['nom_f'] .'</h6>
                        </div>
                    </a>
                </div>
            </div>';
            }
            ?>
        </div>
    </div>
</div>

</section>

<?php
    require "includes/footer.php";//appel du header
?>
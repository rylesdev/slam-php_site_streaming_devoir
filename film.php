<?php
        require "includes/header.php";
?>
<link rel="stylesheet" href="css.css">
<style>
    * {
        margin: 0;
        padding: 0;
    }
    .rate {
        float: left;
        height: 46px;
        padding: 0 10px;
    }
    .rate:not(:checked) > input {
        position: absolute;
        top: -9999px;
    }
    .rate:not(:checked) > label {
        float: right;
        width: 1em;
        overflow: hidden;
        white-space: nowrap;
        cursor: pointer;
        font-size: 30px;
        color: #ccc;
    }
    .rate:not(:checked) > label:before {
        content: '★ ';
    }
    .rate > input:checked ~ label {
        color: #ffc700;
    }
    .rate:not(:checked) > label:hover,
    .rate:not(:checked) > label:hover ~ label {
        color: #deb217;
    }
    .rate > input:checked + label:hover,
    .rate > input:checked + label:hover ~ label,
    .rate > input:checked ~ label:hover,
    .rate > input:checked ~ label:hover ~ label,
    .rate > label:hover ~ input:checked ~ label {
        color: #c59b08;
    }
</style>

<?php
//echo $_GET['id'];
if(isset($_POST['supprimer']))
{
    $requete = $bdd->prepare("DELETE FROM film WHERE id_f = ?");
    $requete->execute(array($_GET['id']));
    echo '<script>alert("Suppression réussite")</script>';
    echo '<script>window.location.href = "index.php";</script>';
}

$sql = 'SELECT * FROM film
WHERE id_f = ' . $_GET['id'];
$requete = $bdd->query($sql);
                                $reponse = $requete->fetch();
echo '
<body>
    <div class="container">
        <h1>'.$reponse['nom_f'].'</h1>
        <div class="video">
        '.$reponse['lien_f'].'
            <div class="info">  
                <p>Genre: '.$reponse['catégorie'].'</p>
                <p>Durée: '.$reponse['duree_f'].' minutes</p>
                <div class="rate">
  <input type="radio" id="star5" name="rate" value="5" />
  <label for="star5" title="text">5 stars</label>
  <input type="radio" id="star4" name="rate" value="4" />
  <label for="star4" title="text">4 stars</label>
  <input type="radio" id="star3" name="rate" value="3" />
  <label for="star3" title="text">3 stars</label>
  <input type="radio" id="star2" name="rate" value="2" />
  <label for="star2" title="text">2 stars</label>
  <input type="radio" id="star1" name="rate" value="1" />
  <label for="star1" title="text">1 star</label>
</div>
            </div>
        </div>
        <div class="synopsis">
            <h2>Synopsis</h2>
            <p>'.$reponse['description_f'].'</p>
            
        </div>    
    </div>
</body>
'
?>
<?php
if (isset($_SESSION['profil'])) {
            if ($_SESSION['profil'] === 2) {
            echo '<div class="container">
            <div class="form-container">
                <form action="" method="post">
                    <input type="submit" name="supprimer" value="Supprimer film">
                </form>
            </div>
        </div>';
    }}
    ?>

<?php
        require "includes/footer.php";
?>
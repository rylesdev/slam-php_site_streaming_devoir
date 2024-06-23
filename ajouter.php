<?php
    require "includes/header.php";//appel du header
?>

<section class="container-fluid">
<?php

if(isset($_POST['finish'])) {
    $nom = $_POST['name'];
    $duree = $_POST['duree'];
    $description = $_POST['description'];
    $lien = $_POST['lien'];
    $image = $_POST['image'];
    $categorie = $_POST['categorie'];
    
    $requete = $bdd->prepare("INSERT INTO film (nom_f, duree_f, description_f, lien_f, image_f, id_c)
                            values (:nom, :duree, :description, :lien, :image, :categorie)");
    
    $requete->bindParam(':nom', $nom);
    $requete->bindParam(':duree', $duree);
    $requete->bindParam(':description', $description);
    $requete->bindParam(':lien', $lien);
    $requete->bindParam(':image', $image);
    $requete->bindParam(':categorie', $categorie);
    
    $requete->execute();
}

                
                    ?>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2>Ajouter un Film</h2>
                <form action="" method="post">
                    <div class="form-group">
                        <label for="nom_film">Nom du Film:</label>
                        <input type="text" class="form-control" id="nom_film" name="name" required>
                    </div>
                    <div class="form-group">
                        <label for="duree">Durée (en minutes):</label>
                        <input type="number" class="form-control" id="duree" name="duree" required>
                    </div>
                    <div class="form-group">
                        <label for="description">Description:</label>
                        <textarea class="form-control" id="description" name="description" rows="3" required></textarea>
                    </div>
                    <div class="form-group">
                        <label for="lien_video">Lien de la Vidéo:</label>
                        <input type="text" class="form-control" id="lien_video" name="lien" required>
                    </div>
                    <div class="form-group">
                        <label for="image">Adresse de l'image:</label>
                        <input type="text" class="form-control" id="image" name="image" required>
                    </div>
                    <div class="form-group">
                    <fieldset>
                        <legend>Catégorie</legend>
                        <div>
                            <input type="radio" id="abonne" name="categorie" value="1" checked="checked"/>
                            <label for="visiteur">Science-Fiction</label>
                        </div>
                        <div>
                            <input type="radio" id="admin" name="categorie" value="2"/>
                            <label for="vendeur">Action</label>
                        </div>
                        <div>
                            <input type="radio" id="admin" name="categorie" value="3"/>
                            <label for="vendeur">Aventure</label>
                        </div>
                        <div>
                            <input type="radio" id="admin" name="categorie" value="4"/>
                            <label for="vendeur">Horreur</label>
                        </div>
                        <div>
                            <input type="radio" id="admin" name="categorie" value="5"/>
                            <label for="vendeur">Western</label>
                        </div>
                        
                    </fieldset>
                    </div>
                    <button type="submit" class="btn btn-primary" name="finish">Ajouter</button>
                </form>
            </div>
        </div>
    </div>
</section>
</body>
<?php
    require "includes/footer.php";//appel du header
?>

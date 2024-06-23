<?php
    require "includes/header.php";//appel du header
?>

<!-- Login and Registration Forms -->
<div class="container">
    <div class="row">
        <!-- Login Form -->
        <div class="col-md-6">
            <main class="form-signin w-100 m-auto">
            <?php
    if(isset($_POST['submit']))
        {
            $login = $_POST['login'];
            $mdp = sha1($_POST['mdp']);
            $requete = $bdd->query("SELECT * from users
                                    WHERE login = '$login' 
                                    AND mdp = '$mdp'");
            $reponse = $requete->fetch();

            if ($reponse)
            {
                $_SESSION['profil'] = $reponse['lvl'];
                $_SESSION['idutilisateur'] = $reponse['id_u'];
                $_SESSION['date_fin'] = $reponse['date_fin_abo'];
                echo '<script>alert("Connexion réussie")</script>';
                echo '<script>window.location.href = "index.php";</script>';
            }
            else
            {
                echo '<script>alert("Identifiant ou mot de passe incorrect")</script>';
                //echo "Mauvais identifiants";
            }
            
        }
?>
                <form method="post">
                    
                    <h1 class="h3 mb-3 fw-normal">Se Connecter</h1>

                    <div class="form-floating">
                        <input
                            type="text"
                            name="login"
                            class="form-control"
                            id="floatingInput"
                            placeholder="Login">
                        <label for="floatingInput">Login</label>
                    </div>
                    <div class="form-floating">
                        <input
                            type="password"
                            name="mdp"
                            class="form-control"
                            id="floatingPassword"
                            placeholder="Mot de passe">
                        <label for="floatingPassword">Mot de passe</label>
                    </div>

                    <div class="form-check text-start my-3">
                        <input
                            class="form-check-input"
                            type="checkbox"
                            value="remember-me"
                            id="flexCheckDefault">
                        <label class="form-check-label" for="flexCheckDefault">
                            Se Souvenir de moi
                        </label>
                    </div>
                    <button class="btn btn-danger w-100 py-2" type="submit" name="submit">Se connecter</button>

                </form>
            </main>
        </div>
        <!-- Registration Form -->
        <div class="col-md-6">
            <main class="form-signin w-100 m-auto">
                <?php
    if(isset($_POST['create']))
    {
        $login = $_POST['login'];
        $mdp = sha1($_POST['mdp']);
        $email = $_POST['email'];
        $_SESSION['profil'] = $_POST['profil'];
        $lvl = $_POST['profil'];
        $date = date('Y-m-d H:i:s');
        $date2 = date('Y-m-d H:i:s', strtotime('+' . $_POST['duree'] . ' days'));
        $requete = $bdd->query("INSERT INTO users (login, mdp, email, lvl, date_deb_abo, date_fin_abo)
                                values ('$login', '$mdp', '$email', '$lvl', '$date', '$date2')");
        echo '<script>alert("Votre compte a bien été créé, veuillez vous connecter")</script>';

    }

?>
                <form action="" method="post">
                    <h1 class="h3 mb-3 fw-normal">S'inscrire</h1>

                    <fieldset>
                        <legend>Type d'abonnement:</legend>
                        <div>
                            <input type="radio" id="abonne" name="profil" value="1" checked="checked"/>
                            <label for="visiteur">Abonnement</label>
                        </div>
                        <div>
                            <input type="radio" id="admin" name="profil" value="2"/>
                            <label for="vendeur">Administrateur</label>
                        </div>
                    </fieldset>

                    <div class="form-floating">
                        <label for="floatingInput">Login</label>
                        <input
                            type="text"
                            name="login"
                            class="form-control"
                            id="floatingInput"
                            placeholder="Login">
                        <label for="floatingInput">Mot de passe</label>
                    </div>
                    <div class="form-floating">
                        <input
                            type="password"
                            name="mdp"
                            class="form-control"
                            id="floatingPassword"
                            placeholder="Password">
                        <label for="floatingPassword">Email</label>
                    </div>
                    <div class="form-floating">
                        <input
                            type="email"
                            name="email"
                            class="form-control"
                            id="floatingInput"
                            placeholder="name@example.com">
                    </div>
                    <fieldset>
                        <legend>Durée d'abonnement:</legend>
                        <div>
                            <input type="radio" id="abonne" name="duree" value="2" checked="checked"/>
                            <label for="visiteur">2 Jours</label>
                        </div>
                        <div>
                            <input type="radio" id="admin" name="duree" value="3"/>
                            <label for="vendeur">3 Jours</label>
                        </div>
                        <div>
                            <input type="radio" id="admin" name="duree" value="5"/>
                            <label for="vendeur">5 Jours</label>
                        </div>
                    </fieldset>
                    <button class="btn btn-danger w-100 py-2" type="submit" name="create">S'inscrire</button>
                </form>
            </main>
        </div>
    </div>
</div>

<!-- JavaScript -->
<script src="../assets/dist/js/bootstrap.bundle.min.js"></script>
<script
    src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
    crossorigin="anonymous"></script>
</body>

<?php
    require "includes/footer.php";//appel du header
?>
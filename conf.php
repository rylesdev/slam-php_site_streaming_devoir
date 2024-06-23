<?php

if(!isset($_SESSION['idutilisateur']) && isset($_COOKIE['login'], $_COOKIE['mdp']) && !empty($_COOKIE['login']) && !empty($_COOKIE['mdp'])) {
    // Connexion à la base de données (assure-toi d'avoir déjà fait cette connexion ailleurs dans ton code)
    // $bdd = new PDO('mysql:host=xxx;dbname=xxx', 'username', 'password');

    if(isset($_POST['submit'])) {
        $login = $_POST['login'];
        $mdp = sha1($_POST['mdp']);
        $requete = $bdd->prepare("SELECT * FROM users WHERE login = :login AND mdp = :mdp");
        $requete->execute(array('login' => $_COOKIE['login'], 'mdp' => $_COOKIE['mdp']));

        // Récupère le résultat de la requête
        $reponse = $requete->fetch();
    }

    if(isset($reponse)) {
        $_SESSION['profil'] = $reponse['lvl'];
        $_SESSION['idutilisateur'] = $reponse['id_u'];
        $_SESSION['date_fin'] = $reponse['date_fin_abo'];
    }}
?>

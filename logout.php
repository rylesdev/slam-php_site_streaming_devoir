<?php
    require "includes/header.php";//appel du header
?>

<?php
unset($_SESSION['profil']);
echo '<script>alert("Vous avez bien été déconnecté")</script>';
echo '<script>window.location.href = "index.php";</script>';
?>
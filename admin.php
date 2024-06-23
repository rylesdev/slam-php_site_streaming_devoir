<?php
    require "includes/header.php";//appel du header
?>

<!DOCTYPE html>
<html>
<head>
    <title>Gestion des bannissements</title>
</head>
<body>
    <h1>Gestion des bannissements</h1>

    <?php
    // Vérifier si le formulaire de bannissement a été soumis
    if (isset($_POST['submit'])) {
        $ip = $_POST['ip'];
        $duree = $_POST['duree'];

        // Bannir l'adresse IP
        bannirMembre($ip, $duree);
    }

    // Vérifier si le formulaire de débannissement a été soumis
    if (isset($_POST['debannir'])) {
        $ip = $_POST['ip'];

        // Débannir l'adresse IP
        debannirMembre($ip);
    }

    // Fonction pour bannir un membre par adresse IP
    function bannirMembre($ip, $duree = null) {
        // Vérifier si l'adresse IP est déjà bannie
        if (estBanni($ip)) {
            echo "Cette adresse IP est déjà bannie.";
            return;
        }

        // Ajouter l'adresse IP à la liste des membres bannis
        $bannissements = lireBannissements();
        $bannissements[] = [
            'ip' => $ip,
            'expiration' => $duree ? time() + $duree : null
        ];

        // Enregistrer la liste des bannissements
        enregistrerBannissements($bannissements);

        echo "Le membre avec l'adresse IP $ip a été banni.";
    }

    // Fonction pour débannir un membre par adresse IP
    function debannirMembre($ip) {
        // Vérifier si l'adresse IP est bannie
        if (!estBanni($ip)) {
            echo "Cette adresse IP n'est pas bannie.";
            return;
        }

        // Supprimer l'adresse IP de la liste des membres bannis
        $bannissements = lireBannissements();
        $nouveauxBannissements = [];

        foreach ($bannissements as $bannissement) {
            if ($bannissement['ip'] !== $ip) {
                $nouveauxBannissements[] = $bannissement;
            }
        }

        // Enregistrer la liste des bannissements mise à jour
        enregistrerBannissements($nouveauxBannissements);

        echo "Le membre avec l'adresse IP $ip a été débanni.";
    }

    // Fonction pour vérifier si un membre est banni par adresse IP
    function estBanni($ip) {
        $bannissements = lireBannissements();

        foreach ($bannissements as $bannissement) {
            if ($bannissement['ip'] === $ip) {
                // Vérifier si le bannissement est permanent ou expiré
                if ($bannissement['expiration'] === null || $bannissement['expiration'] > time()) {
                    return true;
                }
            }
        }

        return false;
    }

    // Fonction pour lire la liste des bannissements depuis un fichier
    function lireBannissements() {
        $fichier = 'bannissements.json';

        if (file_exists($fichier)) {
            $contenu = file_get_contents($fichier);
            return json_decode($contenu, true);
        }

        return [];
    }

    // Fonction pour enregistrer la liste des bannissements dans un fichier
    function enregistrerBannissements($bannissements) {
        $fichier = 'bannissements.json';
        $contenu = json_encode($bannissements);
        file_put_contents($fichier, $contenu);
    }
    ?>

    <h2>Bannir une adresse IP</h2>
    <form method="POST" action="">
        <label for="ip">Adresse IP :</label>
        <input type="text" name="ip" id="ip" required><br>

        <label for="duree">Durée du bannissement (en secondes) :</label>
        <input type="number" name="duree" id="duree"><br>

        <input type="submit" name="submit" value="Bannir">
    </form>

    <h2>Listedes bannissements</h2>

    <?php
    // Afficher la liste des bannissements
    $bannissements = lireBannissements();

    if (empty($bannissements)) {
        echo "Aucun membre n'est actuellement banni.";
    } else {
        echo "<ul>";

        foreach ($bannissements as $bannissement) {
            echo "<li>";
            echo "Adresse IP : " . $bannissement['ip'];

            if ($bannissement['expiration']) {
                $expiration = date('Y-m-d H:i:s', $bannissement['expiration']);
                echo " (Expire le : $expiration)";
            } else {
                echo " (Bannissement permanent)";
            }

            echo "</li>";
        }

        echo "</ul>";
    }
    ?>

    <h2>Débannir une adresse IP</h2>
    <form method="POST" action="">
        <label for="ip_debannir">Adresse IP :</label>
        <input type="text" name="ip" id="ip_debannir" required><br>

        <input type="submit" name="debannir" value="Débannir">
    </form>
</body>
</html>
<?php

// Générer un mot de passe 
function generate_mdp() 
{
    $string = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789!@&;-?^,";
    $mdp = "";

    $mdp .= $string[rand(26,51)];
    $mdp .= $string[rand(26,51)];

    $mdp .= $string[rand(0,25)];
    $mdp .= $string[rand(0,25)];

    $mdp .= $string[rand(52,61)];
    $mdp .= $string[rand(52,61)];

    $mdp .= $string[rand(62,69)];
    $mdp .= $string[rand(62,69)];
    
    $mdp = str_shuffle($mdp);

    return $mdp;
}

function dateDiff($date1, $date2){
	$diff = $date2 - $date1; // abs pour avoir la valeur absolute, ainsi éviter d'avoir une différence négative
	$retour = array();

	$tmp = $diff;
	$retour['second'] = $tmp % 60;

	$tmp = floor( ($tmp - $retour['second']) /60 );
	$retour['minute'] = $tmp % 60;

	$tmp = floor( ($tmp - $retour['minute'])/60 );
	$retour['hour'] = $tmp % 24;

	$tmp = floor( ($tmp - $retour['hour'])  /24 );
	$retour['day'] = $tmp;

	return $retour;
}

function connection_bdd($db_name,$user,$mdp)
{
    try {
        $bdd = new PDO("mysql:host=localhost;dbname=$db_name;charset=utf8", "$user","$mdp");
        return $bdd;
    }

    catch (Exception $e){
        die('<b>Erreur</b> : ' . $e->getMessage());
    }
}


function logout() {
    session_start();
    $_SESSION = array();
    session_destroy();//fermeture session
    header("Location: index.php");
}


function pagination($nbPage,$perPage) {

    $html = '<nav aria-label="Page navigation example">
    <ul class="pagination">';

    for ($i = 1; $i <= $nbPage ; $i++)
    {    
        $html .= '<li class="page-item"><a class="page-link" href="#">'.$i.'</a></li>';
    }
       
    $html .= ' </ul>
        </nav>';

    return $html;
}



function upload_img($img) {
    $tmpName = $img['tmp_name'];
                $name = $img['name'];
                $size = $img['size'];
                $error = $img['error'];
                $img = './upload/'.$name;
                move_uploaded_file($tmpName, '../upload/'.$name);
}


function input( $label, $nom, $type = "text")
{
    $html ='
    <div class="mb-3">
    <label for="'.$nom.'" class="form-label">'.$label.'</label>
    <input type="'.$type.'" class="form-control" id="'.$nom.'" placeholder="name@example.com">
    </div>';

    return $html;

}

?>
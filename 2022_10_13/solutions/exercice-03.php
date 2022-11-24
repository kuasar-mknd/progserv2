<?php

// On vérifie si le cookie a été reçu dans la superglobale $_COOKIE.
if (isset($_COOKIE["nbr_visites"])) {
    $nbr_visites = $_COOKIE["nbr_visites"] + 1;

    setcookie("nbr_visites",$nbr_visites);
    if ($nbr_visites < 4) {
        echo " Vous avez visité le site ". $nbr_visites . " fois." ;
    } else {
        echo "Le site n'est plus accessible (plus de 3 visites)." ;
    }
} else {
	
    //Le cookie n’a pas été reçu
    setcookie("nbr_visites", 1);
    echo "C'est votre première visite.";
}
?>

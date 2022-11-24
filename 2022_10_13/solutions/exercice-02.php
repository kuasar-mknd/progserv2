<?php

// On vérifie si le cookie a été reçu dans la superglobale $_COOKIE.
if (isset($_COOKIE["dates_visites"])) {
    $liste_visites =$_COOKIE["dates_visites"];

    //Décoder la chaine liste_visites pour obtenir le tableau des dates
    $dates=unserialize($_COOKIE["dates_visites"]);

    //Ajouter la date actuelle
    $dates[]=time();
    //renvoyer le cookie avec sa nouvelle valeur , pour cela on sérialise le tableau
    setcookie("dates_visites",serialize($dates));
    //Afficher Les dates de visites stockées dans le tableau $dates
    echo " Vous avez visité le site ".count($dates)." fois:";
    echo "<ul>";
    foreach ($dates as $key => $value) {
        echo "<li>".date("d-m-Y H:i:s",$value)."</li>";
    }
	echo "</ul>";
} else {
	
    //Le cookie n’a pas été reçu
    //Créer un tableau $dates initialisé par la date actuelle
    $dates[]=time();
    //envoyer le cookie en sérialisant le tableau
    setcookie("dates_visites",serialize($dates));
    echo "C'est votre première visite :".date("d-m-Y H:i:s",time());
}

<?php

require_once 'config/autoload.php';

/* Exercice 2
Ecrire un script PHP qui permet de sauvegarder les heures de visites d'une page dans un cookie,et affiche les détails de visites comme suit:
Vous avez visité le site 3 fois :
2018-03-21 23:45:23
2018-03-21 23:46:26
2018-03-22 14:13:52
*/

// On récupère les heures de visites dans le cookie
$visites = $_COOKIE['visites'] ?? '';

// On ajoute l'heure de visite actuelle
$visites .= date('Y-m-d H:i:s') . ';';

// On enregistre les heures de visites dans un cookie
setcookie('visites', $visites, time() + 60);

// On affiche les détails de visites
$visites = explode(';', $visites);
echo 'Vous avez visité le site ' . (count($visites) - 1) . ' fois :<br>';
foreach ($visites as $visite) {
    if ($visite != '') {
        echo $visite . '<br>';
    }
}

?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Exercice 2</title>
    </head>
    <body>
        <h1>Exercice 2</h1>
    </body>
</html>


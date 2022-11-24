<?php

require_once 'config/autoload.php';

/* Exercice 3
A l'aide d'un cookie, limitez la consultation d'une page à 3 visualisations.
Si le nombre de visualisation est atteint, affichez un message d'erreur.
*/

// On récupère le nombre de visualisations dans le cookie
$nbVisualisations = $_COOKIE['nbVisualisations'] ?? 0;

// On incrémente le nombre de visualisations
$nbVisualisations++;

// On enregistre le nombre de visualisations dans un cookie
setcookie('nbVisualisations', $nbVisualisations, time() + 60);

// On affiche le nombre de visualisations
echo 'Vous avez visualisé cette page ' . $nbVisualisations . ' fois.<br>';

// On affiche un message d'erreur si le nombre de visualisations est atteint
if ($nbVisualisations >= 3) {
    echo 'Vous avez atteint le nombre maximum de visualisations.';
}
else echo '<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Exercice 3</title>
</head>
<body>
    <h1>Exercice 3</h1>
</body>
</html>';

?>
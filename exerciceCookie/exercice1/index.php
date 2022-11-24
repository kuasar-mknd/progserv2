<?php

require_once 'config/autoload.php';

/* Exercice 1
Créez un formulaire avec un menu déroulant permettant de choisir langue de préférence del'interface (français, allemand, anglais).
Enregistrez la langue de préférence dans un cookiesvalables 30 jours.
À l’ouverture de la page, récupérez ces valeurs, et afficher la page dans la langue adéquate, avec toujours le formulaire permettant de changer de langue.
*/

if (isset($_POST['langue'])) {
    // On enregistre la langue dans un cookie
    setcookie('langue', $_POST['langue'], time() + 60 * 60 * 24 * 30);
    // On redirige vers la page d'accueil
    header('Location: index.php');
}

// On récupère la langue dans le cookie
$langue = $_COOKIE['langue'] ?? 'fr';

// On affiche la page dans la langue adéquate
switch ($langue) {
    case 'fr':
        echo 'Bonjour';
        break;
    case 'de':
        echo 'Guten Tag';
        break;
    case 'en':
        echo 'Hello';
        break;
}

?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Exercice 1</title>
    </head>
    <body>
        <h1>Exercice 1</h1>
        <form action="index.php" method="post">
            <select name="langue">
                <option value="fr">Français</option>
                <option value="de">Allemand</option>
                <option value="en">Anglais</option>
            </select>
            <input type="submit" value="Valider">
        </form>
    </body>
</html>







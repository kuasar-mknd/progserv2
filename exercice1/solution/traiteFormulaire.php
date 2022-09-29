<?php

// permet le chargement automatique des classes utilisées
require_once('config/autoload.php');

use ch\comem\GenerateurMotDePasse;
use ch\comem\GestionnaireBD;

/**
 * Récupère les information du formulaire (index.html)
 * @return array|null
 */
function recupereInfosFormulaire(): ?array {
    $params = array(
        'tabNbrs' => array(
            'filter' => FILTER_VALIDATE_INT,
            'flags' => FILTER_REQUIRE_ARRAY,
        )
    );
    return filter_input_array(INPUT_POST, $params)["tabNbrs"];
}

/**
 * Affiche le formulaire (index.html)
 */
function afficheFormulaire() {
    header("Location: index.html");
    exit();
}

/**
 * Totalise les valeurs du tableau spécifié
 * @param array $tab Le tableau contenant les valeurs
 * @return int Le total
 */
function totalise(array $tab): int {
    $total = 0;
    foreach ($tab as $nbr) {
        $total += $nbr;
    }
    unset($nbr);
    return $total;
}

//////////////////////////////////////////////////////////////////
///////////////   MISE EN OEUVRE DE LA LOGIQUE   /////////////////
//////////////////////////////////////////////////////////////////

// permet de savoir si l'on provient du formulaire ou non
if (!filter_has_var(INPUT_POST, "tabNbrs")) {
    afficheFormulaire();
}

$nbrs = recupereInfosFormulaire();

// il faut au moins un champ > 0 pour pouvoir générer un mot de passe ;-)
if (totalise($nbrs)===0) {
    afficheFormulaire();
}

$gest = new GestionnaireBD(); // Création de l'objet qui gère la base de données

$cmpt = 0;
$nbTentatives = 100;
do {
    $cmpt++;
    $motDePasse = GenerateurMotDePasse::genereMotDePasse($nbrs[0], $nbrs[1], $nbrs[2], $nbrs[3]); // On ne crée pas d'objet ;-), on s'adresse à la fabrique
    $ok = !$gest->motDePasseExiste($motDePasse);
    if (!$ok) {
        echo "Le mot de passe : $motDePasse existe déjà" . "<br>";
    }
} while (!$ok && $cmpt<$nbTentatives);

if ($cmpt===$nbTentatives) {
    echo "Le nombre de tentatives max a été atteint ! "."<br>";
    echo "Vos voeux ne peuvent êtres réalisés, il faut donner d'autres contraintes " . "<a href='index.html'>retour au formulaire</a>";
} else {
    echo "Le nouveau mot de passe est : $motDePasse" . "<br>";
    $gest->ajouteMotDePasse($motDePasse);   
}

$gest->ferme();
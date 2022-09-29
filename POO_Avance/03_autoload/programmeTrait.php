<?php

// permet le chargement automatique des classes utilisées
require_once('autoload.php');

use ch\comem\Requin;
use ch\comem\VoitureSport;

$requin = new Requin();
echo $requin,'<br>';
echo $requin->definiCouleurAileron("gris");
echo $requin->rendDescriptionAileron(), '<br>';

$voitureSport = new VoitureSport();
$voitureSport->definiCouleurAileron("rouge");
echo $voitureSport, '<br>';

echo '<a href="https://www.php.net/manual/fr/language.oop5.traits.php">Documentation officielle</a>','<br>';
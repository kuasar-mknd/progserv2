<?php

require_once 'Personne.php';
require_once 'Aibo.php';
require_once 'Chien.php';

use ch\comem\Personne;
use ch\comem\Aibo;
use ch\comem\Chien;

$p1 = new Personne('Fritz','Okoul');
$p2 = new Personne('Fritz','Blaser');

$aibo = new Aibo();
$aibo->definiMaitre($p1);
$aibo->disBonjour($p1);
$aibo->disBonjour($p2);

$milou = new Chien('Milou');
$milou->disBonjour($p1);
$milou->definiMaitre($p1);
$milou->disBonjour($p1);

$tab = [$aibo, $milou];

echo "<BR> N'est-ce pas fantastique :-) <BR>";
foreach ($tab as $objet) {
    $objet->disBonjour($p1); // Un appel pour deux méthode disBonjour(...) différentes !!!!
}
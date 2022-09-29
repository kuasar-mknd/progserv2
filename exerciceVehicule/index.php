<?php

require_once 'config/autoload.php';

use ch\comem\Bateau;
use ch\comem\Voiture;
use ch\comem\Aquada;

$tabVehicle = array();

$tabVehicle[] = new Voiture('Peugeot', '308', 'rouge', 120, 5, 3);
$tabVehicle[] = new Voiture('Renault', 'Clio', 'bleu', 140, 5, 5);
$tabVehicle[] = new Bateau('Jeanneau', 'Cap Camarat', 'blanc', 50, 8);
$tabVehicle[] = new Bateau('Jeanneau', 'Cap Camarat', 'noir', 50, 8);
$tabVehicle[] = new Aquada('Aquada', 'Aquada', 'noir', 50, 8, "rouler");

foreach ($tabVehicle as $vehicle) {
    echo $vehicle;
    echo '<hr>';
}

<?php

namespace ch\comem;

require_once 'Animal.php';
require_once 'Personne.php';
require_once 'Reconnaissable.php';

use ch\comem\Animal;
use ch\comem\Personne;
use ch\comem\Reconnaissable;

/**
 * Permet de simuler un chien capable de reconnaitre son maître
 */
class Chien extends Animal implements Reconnaissable {

    private $maitre;
    private $nom;

    /**
     * Crée un chien ayant le nom spécifié
     * n'ayant pas de maître
     * @param string $nom Le nom de l'animal
     */
    public function __construct(string $nom) {
        parent::__construct();
        $this->maitre = null;
        $this->nom = $nom;
    }

    /**
     * Permet de définir le maître du chien
     * @param Personne $maitre Une personne
     */
    public function definiMaitre(Personne $maitre) {
        $this->maitre = $maitre;
    }

    /**
     * Permet de dire bonjour à la personne spécifiée
     * @param Personne $personne Une personne
     * Remarque : L'affichage est différencié si la personne 
     *            est le maître du chien
     */
    public function disBonjour(Personne $personne) {
        if ($personne === $this->maitre) {
            echo $this->nom . ": Wouf Wouf " . $personne;
        } else {
            echo $this->nom . ": Grrr Grrrr" . '<br>';
        }
    }
}
<?php

namespace ch\comem;

require_once 'Robot.php';
require_once 'Reconnaissable.php';

use ch\comem\Robot;
use ch\comem\Reconnaissable;

/**
 * Permet de simuler un robot sachant reconnaître son maître
 */
class Aibo extends Robot implements Reconnaissable {
    
    private $maitre;
    
    /**
     * Construit un Aibo n'ayant pas de maître
     */
    public function __construct() {
        parent::__construct();
        $this->maitre = null;
    }
    
    /**
     * Permet de définir le maitre de l'Aibo
     * @param \ch\comem\Personne $maitre Le maître
     */
    public function definiMaitre(Personne $maitre) {
        $this->maitre = $maitre;
    }

    /**
     * Permet à l'Aibo dire bonjour à la personne spécifiée
     * @param \ch\comem\Personne $personne Une personne
     * Remaque : L'affichage est différencié si la personne est le maître
     */
    public function disBonjour(Personne $personne) {
        if ($personne!=null && $personne === $this->maitre) {
            echo $this . ": Bip Bip " . $personne;
        } else {
            echo $this . ": Buuuuuuuuuh" . '<br>';
        }
    }
    
}
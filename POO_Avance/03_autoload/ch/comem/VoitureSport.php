<?php

namespace ch\comem;

/**
 * Permet de simuler une voiture de sport ayant un aileron
 */
class VoitureSport extends Voiture {
    use Aileron;
    
     /**
     * crée une voiture de sport
     */
    public function __construct() {
        parent::__construct();
    }
    
     /**
     * Rend une chaîne descriptive de la voiture de sport
     */
    public function __toString() {
        return "Je suis une voiture de sport avec un " . $this->rendDescriptionAileron();
    }
}
<?php

namespace ch\comem;

require_once 'Voiture.php';
require_once 'Aileron.php';

use ch\comem\Voiture;

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
    public function __toString() : string {
        return "Je suis une voiture de sport avec un " . $this->rendDescriptionAileron();
    }
}
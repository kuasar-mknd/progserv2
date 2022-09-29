<?php

namespace ch\comem;

/**
 * Permet de simuler une voiture
 */
class Voiture {
    
    /**
     * Crée une voiture
     */
    public function __construct() {} 
    
    /**
     * @return typePermet d'afficher le nom de la classe
     */
    public function __toString() {
        return strtolower((new \ReflectionClass(get_class($this)))->getShortName());
    }
}

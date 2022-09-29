<?php

namespace ch\comem;

/**
 * Permet de simuler un animial
 */
abstract class Animal {

    /**
     * Construit un animal
     */
    public function __construct() {}
    
    /**
     * Affiche le nom de classe
     * @return type La classe de l'animal
     */
    public function __toString() {
        return strtolower((new \ReflectionClass(get_class($this)))->getShortName());
    }

}
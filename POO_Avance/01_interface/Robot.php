<?php

namespace ch\comem;

/**
 * Permet de simuler un robot
 */
abstract class Robot {

    /**
     * Construit un robot
     */
    public function __construct() {}
    
    public function __toString() {
        return strtolower((new \ReflectionClass(get_class($this)))->getShortName());
    }

}
<?php

namespace ch\comem;

/**
 * Permet de simuler un requin ayant un aileron
 */
class Requin {

    use Aileron;

    /**
     * Crée un requin
     */
    public function __construct() {}

    /**
     * Affiche le nom de classe
     * @return type La classe
     */
    public function __toString() {
        return "Je suis un " . strtolower((new \ReflectionClass(
                                get_class($this)))->getShortName()) .
                " avec un " .
                $this->rendDescriptionAileron();
    }

}

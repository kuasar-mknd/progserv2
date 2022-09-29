<?php

namespace ch\comem;

require_once 'Personne.php';

use ch\comem\Personne;

/**
 * Interface contenant l'aptitude à reconnaaître quelqu'un
 */
interface Reconnaissable {
    
    /**
     * Permet de dire bonjour à la personne spécifiée
     * @param Personne $personne La personne a qui dire bonjour
     */
    public function disBonjour(Personne $personne);
}
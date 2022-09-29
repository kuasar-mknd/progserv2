<?php

namespace ch\comem;

/**
 * Un "trait" permet de partager des propriétés et des méthodes avec des classes
 * sans passer par l'héritage (L'héritage multiple est aussi interdit en php)
 * 
 * Un trait ressemble beaucoup à une classe.
 * Mais la grande différence, c'est qu'un "trait" ne s'intancie pas ! 
 * (Donc on NE PEUT PAS FAIRE new Aileron())
 * 
 * Pour utiliser un trait, if faut écrire :
 *      use nomDuTrait;  // voir les classes Requin et VoitureSport
 */
trait Aileron {
    
    // Un trait peut disposer de propriété(s)
    private $couleur = "";
    
    /**
     * Rend une chaîne descriptive de l'aileron
     * @return string La chaine
     */
    public function rendDescriptionAileron() : string {
        return "aileron " . $this->couleur;
    }
    
    /**
     * Permet de définir une couleur à l'aileron
     * @param type $uneCouleur couleur de l'aileron
     */
    public function definiCouleurAileron($uneCouleur) {
        $this->couleur = $uneCouleur;
    }
}
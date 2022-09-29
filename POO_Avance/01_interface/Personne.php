<?php

namespace ch\comem;

use \Exception;

/**
 * Permet de simuler une personne ayant un nom et un prénom
 */
class Personne {

    private $nom;
    private $prenom;

    /**
     * Crée uen personne avec le prenom et le nom spécifié
     * @param string $prenom Le prénom
     * @param string $nom Le nom
     * @throws Exception Lance une exception si le nom ou prénom n'est pas ok
     */
    public function __construct(string $prenom, string $nom) {
        if ($nom === null || strlen($nom) == 0) {
            throw new Exception('Il faut un nom');
        }
        if ($prenom === null || strlen($prenom) == 0) {
            throw new Exception('Il faut un prenom');
        }
        $this->nom = $nom;
        $this->prenom = $prenom;
    }

    /**
     * Rend le nom
     * @return string Le nom
     */
    public function rendNom() : string {
        return $this->nom;
    }
    
    /**
     * Permet de changer le nom de la personne avec le nouveau non spécifié
     * @param string $nouveauNom Le nouveau nom de la personne 
     */
    public function changeNom(string $nouveauNom) {
        $this->nom = $nouveauNom ;
    }

    /**
     * Rend le prénom
     * @return string Le prénom
     */
    public function rendPrenom() : string {
        return $this->prenom;
    }
    
    /**
     * Permet Rend une chaîne contenant le prénom et le nom
     * @return string La chaîne
     */
    public function __toString() : string {
        return $this->prenom . " " . $this->nom . '<br>';
    }
}
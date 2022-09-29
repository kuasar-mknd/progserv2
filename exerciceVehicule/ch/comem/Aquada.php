<?php

namespace ch\comem;

class Aquada extends Vehicule implements Navigable, Roulable
{

    private $mode;

    public function __construct(string $marque, string $modele, string $couleur, int $vitesse, int $nbSieges, string $mode)
    {
        parent::__construct($marque, $modele, $couleur, $vitesse, $nbSieges);
        $this->mode = $mode;
    }

    public function avancer(int $vitesse)
    {
        if ($this->mode == 'rouler') {
            $this->rouler($vitesse);
        } elseif ($this->mode == 'naviguer') {
            $this->naviguer($vitesse);
        }
    }
    public function naviguer(int $vitesse)
    {
        $this->setVitesse($vitesse);
        echo 'Le Aquada navigue à ' . $this->getVitesse() . ' km/h';
    }

    public function rouler(int $vitesse)
    {
        $this->setVitesse($vitesse);
        echo 'Le Aquada roule à ' . $this->getVitesse() . ' km/h';
    }

    public function __toString()
    {
        if($this->mode == "rouler"){
            return 'Le Aquada est un ' . $this->getMarque() . ' ' . $this->getModele() . ' de couleur ' . $this->getCouleur() . ' qui roule à ' . $this->getVitesse() . ' km/h et qui a ' . $this->getNbSieges() . ' sièges.';
        }
        elseif($this->mode == "naviguer"){
            return 'Le Aquada est un ' . $this->getMarque() . ' ' . $this->getModele() . ' de couleur ' . $this->getCouleur() . ' qui navigue à ' . $this->getVitesse() . ' km/h et qui a ' . $this->getNbSieges() . ' sièges.';
        }

    }
}
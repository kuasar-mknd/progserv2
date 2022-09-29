<?php

namespace ch\comem;

class Bateau extends Vehicule implements Navigable
{

    public function naviguer(int $vitesse)
    {
        $this->setVitesse($vitesse);
        echo 'Le bateau navigue à ' . $this->getVitesse() . ' km/h';
    }

    public function avancer(int $vitesse)
    {
        $this->naviguer($vitesse);
    }

    public function __toString()
    {
           return 'Le bateau est un ' . $this->getMarque() . ' ' . $this->getModele() . ' de couleur ' . $this->getCouleur() . ' qui navigue à ' . $this->getVitesse() . ' km/h et qui a ' . $this->getNbSieges() . ' sièges.';
    }
}
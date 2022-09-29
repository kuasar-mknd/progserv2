<?php

namespace ch\comem;

class Voiture extends Vehicule implements Roulable
{

        private $nbPortes;

        public function __construct(string $marque, string $modele, string $couleur, int $vitesse, int $nbSieges, int $nbPortes)
        {
            parent::__construct($marque, $modele, $couleur, $vitesse, $nbSieges);
            $this->nbPortes = $nbPortes;
        }

        public function getNbPortes(): int
        {
            return $this->nbPortes;
        }

        public function setNbPortes(int $nbPortes)
        {
            $this->nbPortes = $nbPortes;
        }

        public function rouler(int $vitesse)
        {
            $this->setVitesse($vitesse);
            echo 'La voiture roule à ' . $this->getVitesse() . ' km/h';
        }

        public function __toString()
        {
            return 'La voiture est une ' . $this->getMarque() . ' ' . $this->getModele() . ' de couleur ' . $this->getCouleur() . ' qui roule à ' . $this->getVitesse() . ' km/h et qui a ' . $this->getNbSieges() . ' sièges et ' . $this->getNbPortes() . ' portes.';
        }

        public function avancer(int $vitesse)
        {
            $this->rouler($vitesse);
        }

}
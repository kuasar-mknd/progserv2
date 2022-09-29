<?php

namespace ch\comem;

abstract class Vehicule
{

    private $marque;
    private $modele;
    private $couleur;
    private $vitesse;
    private $nbSieges;

    public function __construct(string $marque, string $modele, string $couleur, int $vitesse, int $nbSieges)
    {
        $this->marque = $marque;
        $this->modele = $modele;
        $this->couleur = $couleur;
        $this->vitesse = $vitesse;
        $this->nbSieges = $nbSieges;
    }

    public function getMarque(): string
    {
        return $this->marque;
    }

    public function getModele(): string
    {
        return $this->modele;
    }

    public function getCouleur(): string
    {
        return $this->couleur;
    }

    public function getVitesse(): int
    {
        return $this->vitesse;
    }

    public function getNbSieges(): int
    {
        return $this->nbSieges;
    }

    public function setVitesse(int $vitesse)
    {
        $this->vitesse = $vitesse;
    }

    abstract public function __toString();

    abstract public function avancer(int $vitesse);



}
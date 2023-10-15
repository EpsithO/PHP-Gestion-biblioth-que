<?php

namespace App;

class BluRay extends Media
{
    protected string $realisateur;
    protected float $duree;
    protected string $anneeSortie;

    public function __construct(string $titre,string $realisateur,float $duree,string $anneeSortie )
    {
        $dureeEmprunt = 15;
        parent::__construct($titre, $dureeEmprunt);
        $this->realisateur = $realisateur;
        $this->duree = $duree;
        $this->anneeSortie = $anneeSortie;

    }


    public function getInformationsMedia()
    {
        return "Le Réalisateur est : {$this->realisateur}".PHP_EOL."
                son Titre est : {$this->titre}".PHP_EOL."
                sa durée est de : {$this->duree}"."minute".PHP_EOL."
                Son Année de sortie est : {$this->anneeSortie}".PHP_EOL."
        ";
    }
}
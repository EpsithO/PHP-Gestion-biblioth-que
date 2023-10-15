<?php

namespace App;

class Livre extends Media
{
    protected string $isbn;
    protected string $auteur;
    protected int $nbrPage;

    public function __construct(string $titre,string $isbn,string $auteur,int $nbrPage)
    {
        $dureeEmprunt = 21;
        parent::__construct($titre, $dureeEmprunt);
        $this->isbn = $isbn;
        $this->auteur = $auteur;
        $this->nbrPage = $nbrPage;
    }

    public function getInformationsMedia() :string
    {
        return "Son ISBN : {$this->isbn}".PHP_EOL."
                Le Titre est : {$this->titre}".PHP_EOL."
                Son Auteur est : {$this->auteur}".PHP_EOL."
                Son Nombre de page est : {$this->nbrPage}".PHP_EOL."
        
        ";
    }
}
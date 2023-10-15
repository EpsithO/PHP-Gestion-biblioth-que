<?php

namespace App;

class Adherent
{
    private string $numeroAdherent;
    private string $prenom;
    private string $nom;
    private string $email;
    private $dateAdhesionAdherent;

    public function __construct(string $prenom, string $nom,string $email, string $dateAdhesionAdherent= null) {
        $this->numeroAdherent = $this->genererNumeroAdhrent();
        $this->prenom = $prenom;
        $this->nom = $nom;
        $this->email = $email;
        if ($dateAdhesionAdherent == null) {
            $this->dateAdhesionAdherent = new \DateTime();;
        } else {
            $this->dateAdhesionAdherent = \DateTime::createFromFormat("d/m/Y",$dateAdhesionAdherent);
        }
    }

    private function genererNumeroAdhrent() :string {
        return "AD-".random_int(100000,999999);
    }

    public function renouvelerAdhesionAdherent() : void {
        $this->dateAdhesionAdherent = $this->dateAdhesionAdherent->modify("+1 year");
    }

    /**
     * @return string
     */
    public function getNumeroAdherent(): string
    {
        return $this->numeroAdherent;
    }


    public function getInfoAdherent() :string {
        return "L'adherent Numero : {$this->numeroAdherent}".PHP_EOL."
                De son identité Nom : {$this->nom}
                Prenom : {$this->prenom}".PHP_EOL."
                Joignable via l'Email : {$this->email}".PHP_EOL."
                Date d'adhésion : {$this->dateAdhesionAdherent}".PHP_EOL."
                ";
    }

    public function IsadhesionValable() :bool  {
        $dateValidite = \DateTime::createFromFormat("d/m/Y",$this->dateAdhesionAdherent->format("d/m/Y"));
        $dateValidite->modify("+1 year");
        $dateJour = new \DateTime();
        if ($dateJour->diff($dateValidite)->invert == 0) {
            return true;
        } else {
            return false;
        }
    }
    /**
     * @return string
     */
    public function getPrenom(): string
    {
        return $this->prenom;
    }

    /**
     * @return string
     */
    public function getNom(): string
    {
        return $this->nom;
    }

    /**
     * @return string
     */
    public function getEmail(): string
    {
        return $this->email;
    }

    /**
     * @return \DateTime
     */
    public function getDateAdhesion(): \DateTime
    {
        return $this->dateAdhesionAdherent;
    }


}
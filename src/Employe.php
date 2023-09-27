<?php

namespace App;

class Employe extends Personnel
{


    public function __construct(string $prenom, string $nom, int $age, float $salaire)
    {
        parent::__construct($prenom, $nom, $age, $salaire);
    }

    public function presentation(): string
    {
        return "Je m'appelle $this->prenom $this->nom et j'ai $this->age ans.";
    }

    public function calculerSalaire(): float
    {
        return $this->salaire;
    }
}
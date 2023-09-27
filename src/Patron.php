<?php

namespace App;

class Patron extends Personnel
//La classe Patron hérite de la classe Personnel
{
    protected float $bonus;
    protected string $voiture;

    /**
     * @param string $voiture
     */
    public function __construct(string $prenom, string $nom, int $age, float $salaire, string $voiture, float $bonus)
    {
        //Appel au constructeur de la classe employé
        parent::__construct($prenom, $nom, $age, $salaire);
        $this->bonus = $bonus;
        $this->voiture = $voiture;
    }

    /**
     * @return string
     */
    public function getVoiture(): string
    {
        return $this->voiture;
    }

    /**
     * @return float
     */
    public function getBonus(): float
    {
        return $this->bonus;
    }

    public function presentation(): string
    {
        return "Bonjour, je me nomme $this->prenom $this->nom et JE suis le BOSS !!!";
    }

    public function deplacement():string{
        return "Je me déplace en $this->voiture.".PHP_EOL;
    }

    public function calculerSalaire(): float
    {
        return $this->salaire+$this->bonus;
    }
}
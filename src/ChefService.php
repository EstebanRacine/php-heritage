<?php

namespace App;

class ChefService extends Personnel
{
    protected string $service;

    public function __construct(string $prenom, string $nom, int $age, float $salaire, string $service)
    {
        parent::__construct($prenom, $nom, $age, $salaire);
        $this->service = $service;
    }

    /**
     * @return string
     */
    public function getService(): string
    {
        return $this->service;
    }

    public function presentation(): string
    {
        return "Bonjour, je suis $this->prenom $this->nom, j'ai $this->age ans et je suis le chef du $this->service.";
    }

    public function calculerSalaire(): float
    {
        return $this->salaire+$this->salaire*0.1;
    }

}
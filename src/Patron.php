<?php

namespace App;

class Patron extends Employe
//La classe Patron hérite de la classe Employe
{
    protected string $voiture;

    /**
     * @param string $voiture
     */
    public function __construct(string $prenom, string $nom, int $age, string $voiture)
    {
        //Appel au constructeur de la classe employé
        parent::__construct($prenom, $nom, $age);
        $this->voiture = $voiture;
    }

    public function presentation(): string
    {
        return "Bonjour, je me nomme $this->prenom $this->nom et JE suis le BOSS !!!";
    }

    /**
     * @return string
     */
    public function getVoiture(): string
    {
        return $this->voiture;
    }


    public function deplacement():string{
        return "Je me déplace en $this->voiture.".PHP_EOL;
    }
}
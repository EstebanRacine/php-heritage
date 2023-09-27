<?php

namespace App;

class Employe extends Personnel
{

    public function presentation(): string
    {
        return "Je m'appelle $this->prenom $this->nom et j'ai $this->age ans.";
    }
}
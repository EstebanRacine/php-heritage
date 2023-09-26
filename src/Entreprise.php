<?php

namespace App;

class Entreprise
{
    protected string $nom;
    protected string $ville;

    /**
     * @var Employe[]
     */
    protected array $employes;

    /**
     * @param string $nom
     * @param string $ville
     */
    public function __construct(string $nom, string $ville)
    {
        $this->nom = $nom;
        $this->ville = $ville;
        $this->employes = [];
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
    public function getVille(): string
    {
        return $this->ville;
    }

    /**
     * @return array
     */
    public function getEmployes(): array
    {
        return $this->employes;
    }

    /**
     * @param Employe $employe
     * @return void
     */
    public function ajouterEmploye(Employe $employe):void{
        if($employe instanceof Patron){
            if ($this->getPatron() != null){
                return;
            }
        }

//        if(!in_array($employe, $this->employes)){
            $this->employes[] = $employe;
//        }
    }

    public function getPatron(): ?Patron{
        foreach ($this->employes as $employe){
            if ($employe instanceof Patron){
                return $employe;
            }
        }
        return null;
    }

    public function presentationsEmployes():void{
        foreach ($this->employes as $employe){
            echo $employe->presentation().PHP_EOL;
        }
    }


}
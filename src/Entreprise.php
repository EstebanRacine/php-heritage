<?php

namespace App;

use League\Csv\Reader;

class Entreprise
{
    protected string $nom;
    protected string $ville;

    /**
     * @var Personnel[]
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
     * @param Personnel $employe
     * @return void
     */
    public function ajouterEmploye(Personnel $employe):bool{
        if($employe instanceof Patron){
            if ($this->getPatron() != null){
                return 0;
            }
        }

        $this->employes[] = $employe;
        return 1;
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

    /**
     * @return array
     */
    public function getListeEmployes():array{
        $results = [
        ];
        foreach ($this->employes as $employe){
            $reflexion = new \ReflectionClass($employe);
            $results[$reflexion->getShortName()][] = $employe;
        }
        return $results;
    }

    public function insertCSV(){
        $csv = Reader::createFromPath('csv/Effectif.csv', 'r');
        $csv->setHeaderOffset(0);
        $csv->setDelimiter(';');
        $records = $csv->getRecords();
        foreach ($records as $record){
            switch ($record["Categorie"]){
                case "P":
                    $employe = new Patron($record["Prenom"], $record["Nom"], $record["Age"], $record["Salaire"], $record["Voiture"], $record["Bonus"]);
                    break;
                case "C":
                    $employe = new ChefService($record["Prenom"], $record["Nom"], $record["Age"], $record["Salaire"], $record["Service"]);
                    break;
                default:
                    $employe = new Employe($record["Prenom"], $record["Nom"], $record["Age"], $record["Salaire"]);
                    break;
            }
            $this->employes[] = $employe;
        }
    }

    public function calculerSalaires():array{
        $results = [];
        foreach ($this->employes as $employe){
            $results[] = [
                "Salarié" => $employe->getPrenom()." ".$employe->getNom(),
                "Salaire" => $employe->calculerSalaire()
            ];
        }
        return $results;
    }

    public function calculerMasseSalariale():float{
        $result = 0;
        foreach ($this->employes as $employe){
            $result += $employe->calculerSalaire();
        }
        return $result;
    }

    public function calculerSalaireMoyen():float{
        return $this->calculerMasseSalariale()/count($this->employes);
    }

}

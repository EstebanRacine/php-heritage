<?php
require "vendor/autoload.php";

$entreprise = new \App\Entreprise("ABCDEntreprise", "Besançon");
$emp1 = new \App\Employe("Alain", "Tairieure", "48");
$emp2 = new \App\Patron("Ginette", "Pakaflou", "60", "Renault 4L");
$emp3 = new \App\ChefService("Louis", "Palodora", "26", "Pôle Senteur");
$entreprise->ajouterEmploye($emp1);
$entreprise->ajouterEmploye($emp2);
$entreprise->ajouterEmploye($emp3);
echo "Présentations : ".PHP_EOL;
$entreprise->presentationsEmployes();
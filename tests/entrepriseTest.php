<?php
require "vendor/autoload.php";

//////////////////////////////////////////
//Création des objets
//////////////////////////////////////////

$entreprise = new \App\Entreprise("ABCDEntreprise", "Besançon");
$emp1 = new \App\Employe("Alain", "Tairieure", "48");
$emp2 = new \App\Patron("Ginette", "Pakaflou", "60", "Renault 4L");
$emp3 = new \App\ChefService("Louis", "Palodora", "26", "Pôle Senteur");
$emp4 = new \App\Patron("Josh", "Test", 90, "Clio IV");
$emp5 = new \App\Employe("Bastien", "Moalamin", "24");

//////////////////////////////////////////
//Présentations + recherche patron (sans)
//////////////////////////////////////////

$entreprise->ajouterEmploye($emp1);
$entreprise->ajouterEmploye($emp3);
echo "Présentations : ".PHP_EOL;
$entreprise->presentationsEmployes();

$patron = $entreprise->getPatron();
if($patron == null){
    echo "Il n'y a pas de patron.".PHP_EOL;
}else {
    echo "Le patron : {$patron->getPrenom()} {$patron->getNom()}" . PHP_EOL;
}

//////////////////////////////////////////
//Présentations + recherche patron (avec)
//////////////////////////////////////////

echo PHP_EOL.PHP_EOL.PHP_EOL;

$entreprise->ajouterEmploye($emp4);
$entreprise->presentationsEmployes();

$patron = $entreprise->getPatron();

if($patron == null){
    echo "Il n'y a pas de patron.".PHP_EOL;
}else {
    echo "Le patron : {$patron->getPrenom()} {$patron->getNom()}" . PHP_EOL;
}

//////////////////////////////////////////
//Dump liste des employés
//////////////////////////////////////////

echo PHP_EOL.PHP_EOL.PHP_EOL;
$entreprise->ajouterEmploye($emp5);
dump($entreprise->getListeEmployes());

//////////////////////////////////////////
//Gestion du CSV
//////////////////////////////////////////

echo PHP_EOL.PHP_EOL.PHP_EOL;
echo "test";
echo PHP_EOL.PHP_EOL.PHP_EOL;
$entrepriseBis = new \App\Entreprise("EntrepriseBis", "Paris");
$entrepriseBis->insertCSV();
dump($entrepriseBis->getListeEmployes());
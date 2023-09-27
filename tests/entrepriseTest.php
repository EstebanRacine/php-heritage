<?php
require "vendor/autoload.php";

//////////////////////////////////////////
//Création des objets
//////////////////////////////////////////

$entreprise = new \App\Entreprise("ABCDEntreprise", "Besançon");
$emp1 = new \App\Employe("Alain", "Tairieure", "48", 750);
$emp2 = new \App\Patron("Ginette", "Pakaflou", "60",2800, "Renault 4L", 750);
$emp3 = new \App\ChefService("Louis", "Palodora", "26", 2000, "Pôle Senteur");
$emp4 = new \App\Patron("Josh", "Test", 90, 2800, "Clio IV", 250);
$emp5 = new \App\Employe("Bastien", "Moalamin", "24", 1400);

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

//////////////////////////////////////////
/// Test salaires
/// //////////////////////////////////////////

echo PHP_EOL.PHP_EOL.PHP_EOL;
dump($entrepriseBis->calculerSalaires());

echo PHP_EOL.PHP_EOL.PHP_EOL;
echo "La masse salariale est de {$entrepriseBis->calculerMasseSalariale()}€".PHP_EOL;
echo "Le salaire moyen est de {$entrepriseBis->calculerSalaireMoyen()}€".PHP_EOL;
dump($entrepriseBis->personnelMeilleurePaieParType("ChefService"));


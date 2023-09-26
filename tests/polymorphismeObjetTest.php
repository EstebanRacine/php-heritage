<?php
require "vendor/autoload.php";
/**
 * @param \App\Employe $employe
 * @return void
 */
function test(\App\Employe $employe):void{
    if($employe instanceof \App\Employe){
        echo "{$employe->getPrenom()} est de type Employe".PHP_EOL;
    }
    if($employe instanceof \App\Patron){
        echo "{$employe->getPrenom()} est de type Patron".PHP_EOL;
    }
    if($employe instanceof \App\ChefService){
        echo "{$employe->getPrenom()} est de type ChefService".PHP_EOL;
    }
}

$emp1 = new \App\Employe("Alain", "Delon", "87");
$emp2 = new \App\Patron("Ginette", "Pahinkaflou", "60", "Renault 4L");
$emp3 = new \App\ChefService("Louis", "Palodora", "26", "Service Informatique");
test($emp1);
test($emp2);
test($emp3);
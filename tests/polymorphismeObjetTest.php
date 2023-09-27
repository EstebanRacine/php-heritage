<?php
require "vendor/autoload.php";
/**
 * @param \App\Personnel $employe
 * @return void
 */
function test(\App\Personnel $employe):void{
    if($employe instanceof \App\Personnel){
        echo "{$employe->getPrenom()} est de type Personnel".PHP_EOL;
    }
    if($employe instanceof \App\Patron){
        echo "{$employe->getPrenom()} est de type Patron".PHP_EOL;
    }
    if($employe instanceof \App\ChefService){
        echo "{$employe->getPrenom()} est de type ChefService".PHP_EOL;
    }
}

$emp1 = new \App\Personnel("Alain", "Delon", "87");
$emp2 = new \App\Patron("Ginette", "Pahinkaflou", "60", "Renault 4L");
$emp3 = new \App\ChefService("Louis", "Palodora", "26", "Service Informatique");
test($emp1);
test($emp2);
test($emp3);
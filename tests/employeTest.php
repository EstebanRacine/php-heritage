<?php

require "vendor/autoload.php";

$emp1 = new \App\Employe("Ginette", "Pahinkaflou", 61);
echo $emp1->presentation();
<?php

require "vendor/autoload.php";

$emp1 = new \App\Employe("Ginette", "Paflou", 61);
echo $emp1->presentation();
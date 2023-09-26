<?php

require "vendor/autoload.php";

$chef1 = new \App\ChefService("Alain", "Durand", 38, "Service Informatique");
echo $chef1->presentation();
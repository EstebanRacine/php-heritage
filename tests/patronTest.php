<?php

require "vendor/autoload.php";

$pat1 = new \App\Patron("José", "Finn", "37", "Delorean");
echo $pat1->presentation();
echo $pat1->deplacement();
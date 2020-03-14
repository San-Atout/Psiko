<?php

require ("../src/routeur/AltoRouter.php");
require ("../src/routeur/Routeur.php");

ob_start();
$routeur = new \Psiko\Routeur(dirname(__DIR__) . '/views', dirname(__DIR__) ."/public");
session_start();
$routeur->getAllPageFrench()
    ->run();


$contenue = ob_get_clean();

var_dump($contenue);

require dirname(__DIR__) . '/views/templates/default.php';


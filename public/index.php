<?php

require ("../src/routeur/AltoRouter.php");
require ("../src/routeur/Routeur.php");
require ("../src/database/MysqlDatabase.php");
require ("../src/helper/Helper.php");

ob_start();
$routeur = new \Psiko\routeur\Routeur(dirname(__DIR__) . '/views', dirname(__DIR__) ."/public");
session_start();
$routeur->getAllPageFrançais()
        ->getAllPageAnglais()
        ->getAllPageArabe()
        ->getAllPagePolonais()
        ->run();
$autrePages = $routeur->getPageOtherLanguage();

$contenue = ob_get_clean();
require dirname(__DIR__) .DIRECTORY_SEPARATOR. 'views/templates/default.php';


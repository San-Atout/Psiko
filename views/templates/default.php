<?php

/**
  created on : 09/03/2020 at 13:46
  created by : Augustin ROUSSET-ROUVIERE 
  fichier php contenant le gabari par défault du site web
*/
$lienAr = isset($autrePages["ar"])? $autrePages["ar"] : $routeur->getUrl("404 ar");
$lienFr = isset($autrePages["fr"])? $autrePages["fr"] : $routeur->getUrl("404 fr");
$lienEn = isset($autrePages["en"])? $autrePages["en"] : $routeur->getUrl("404 en");
$lienPl = isset($autrePages["pl"])? $autrePages["pl"] : $routeur->getUrl("404 pl");
$database =  new \Psiko\database\MysqlDatabase("psiko");
$database->getPDO();
?>
<!DOCTYPE html>
<html>
<head>
    <meta lang="<?=$routeur->getLangue()?>">
    <meta charset= "utf-8" />
    <link rel="stylesheet" href="/CSS/main.css"/>											<!--choisir le fichier CSS qui va bien-->

    <link rel="icon" type="png" href="/Images/icon.png" />				<!-- Logo de la page sur l'onglet-->
    <title>Infinite Measures</title>   																<!-- Mettre le titre de la page-->
</head>
<body id="page">
    <?php require 'header'.DIRECTORY_SEPARATOR.$routeur->langue.'.php'; ?>


    <div id="contenu">
       <?=$contenue?>
    </div>
    <?php require 'footer'.DIRECTORY_SEPARATOR.$routeur->langue.'.php'?>
    </body>
</html>

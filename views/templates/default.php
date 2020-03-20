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

<ul>
    <li><a href="<?=$lienFr?>">vers le site en fr</a></li>
    <li><a href="<?=$lienEn?>">vers le site en en</a></li>
    <li><a href="<?=$lienAr?>">vers le site en ar</a></li>
    <li><a href="<?=$lienPl?>">vers le site en pl</a></li>
</ul>
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
    <meta charset= "utf-8" />
    <link rel="stylesheet" href="/CSS/main.css"/>											<!--choisir le fichier CSS qui va bien-->

    <link rel="icon" type="png" href="/Images/Infinite_measures.png" />				<!-- Logo de la page sur l'onglet-->
    <title>Infinite Measures</title>   																<!-- Mettre le titre de la page-->
</head>
<body id="page">
    <?php require 'header'.DIRECTORY_SEPARATOR.$routeur->getLangue().'.php'?>


    <div id="contenu">
        <div>
            <nav>
                <ul id="menu_utilisateur">
                    <li class="menu_deroulant"><a href="projet.html">Notre produit &ensp;</a>
                        <ul class="sous">
                            <li><a href="#">Déroulé des tests</a></li>
                            <li><a href="#">Fréquence cardiaque</a></li>
                            <li><a href="#">Température de la peau</a></li>
                        </ul>
                    </li>
                    <li><a href="#">Mon profil <!--(si non connecté, renvoyer sur la page de connexion)--></a></li>
                    <li><a href="#">un autre outil de nav</a></li>
                </ul>
            </nav>
        </div>

       <?=$contenue?>
    </div>
    <?php require 'footer'.DIRECTORY_SEPARATOR.$routeur->getLangue().'.php'?>
    </body>
</html>

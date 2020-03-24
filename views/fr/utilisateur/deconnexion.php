<?php

$deconnexion = new userEntity();
$deconnexion->deconnexion();
header("Location: /fr/connexion");
exit();
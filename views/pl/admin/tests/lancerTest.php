<?php
if (!isset($_SESSION["auth"]))
{
    header("Location: /pl/connexion/");
    exit();
}
if ($_SESSION["auth"]->getRang() != "administrateur" && $_SESSION["auth"]->getRang() != "gestionnaire")
{
    header("Location: /pl/401");
    exit();
}
<?php
if (!isset($_SESSION["auth"]))
{
    header("Location:/fr");
    exit();
}
unset($_SESSION['auth']);
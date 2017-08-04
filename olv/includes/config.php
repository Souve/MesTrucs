<?php
    ini_set("display_errors", true);
    error_reporting(E_ALL);

    require("constants.php");
    require("functions.php");

    session_start();

    $_SERVER['date']['mois'] = ["Janvier", "Février", "Mars", "Avril", "Mai", "Juin", "Juillet", "Août", "Septembre", "Octobre", "Novembre", "Decembre"];

    if ($_SESSION["user"] == false)
    {
        redirect("login.php");
    }

?>

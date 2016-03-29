<?php

    /* Page racine du site, d'où part toute la navigation */

    session_start();

    mb_internal_encoding("UTF-8");

    if (empty($_SESSION['login']) && empty($_SESSION['situation'])) {   // Si aucune session n'est ouverte
        include ('_templates/login/login.php');     // Affichage de la page de connexion
    } else {
        include ('_templates/default/default.php');     // Affichage de l'interface utilisateur
    }
?>

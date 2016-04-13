<?php

/*-- INCLUDES --*/

/*-- INCLUSION CLASSES GLOBALES - dossier ~/_classes/ --*/
include('_classes/user.class.php');         //Gestion utilisateurs

/*-- INCLUSION FONCTIONS GLOBALES - dossier ~/_functions/ --*/
include('_functions/db.functions.php');     //Gestion base de données
include('_functions/log.functions.php');    //Gestion connexion/déconnexion

/*-- MAIN --*/

session_start();
if (empty($_SESSION['user'])) {
    include('_templates/login/login.php');
} else {
    include('_templates/default/default.php');
}
?>

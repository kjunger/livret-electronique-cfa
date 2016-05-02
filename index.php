<?php
session_start();                                        //Démarrage session (prévoir une procédure plus sécurisée)
header( 'content-type: text/html; charset=utf-8' );     //Forcer l'encodage du texte en UTF-8
if (isset($_SESSION['id'])) {                           //Si session déjà en route
    include_once '_views/private.php';                  //Inclusion du template "private" (l'interface utilisé par les utilisateurs connectés)
} else {
    include_once '_views/login.php';                    //Inclusion de l'interface de connexion
}
?>
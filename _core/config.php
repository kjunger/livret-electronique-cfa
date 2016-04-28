<?php
//Fichier de configuration global
//Doit être placé dans le dossier ~/_core/ correctement protégé via un .htaccess

/*  BASES DE DONNEES */
const DB = array( "host" => "10.0.2.15", "port" => 3306, "name" => "LivretElectroniq", "user" => "LivretElectroniq", "pass" => "test" );
//Possibilité de déclarer d'autres bases de données à la suite
/* Exemple :
 * const NOUVELLE_DB = array(
 *      "host" => "adresse_du_serveur",      //peut-être soit une URL, soit une adresse IP - obligatoirement entre ""
 *      "port" => numero_de_port,            //le port utilisé pour accéder au serveur de BDD, sans "" - par défaut avec MySQL : 3306
 *      "name" => "nom_de_la_base",          //obligatoirement entre ""
 *      "user" => "utilisateur_de_la_base",  //doit avoir les droits nécessaires sur la base de données - obligatoirement entre ""
 *      "pass" => "mot_de_passe_utilisateur" //obligatoirement entre ""
 * );
 */

/* CONSTANTES DE CHEMINS D'ACCES */
const FUNC_DIR = '_core/functions';     //Chemin d'accès aux fonctions globales
const CLSS_DIR = '_core/classes';       //Chemin d'accès aux classes globales
const VIEW_DIR = '_views';              //Chemin d'accès aux "templates" et leurs vues
?>
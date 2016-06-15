<?php
define('ROOT', dirname(__DIR__));
require ROOT . '/app/App.php';      //Inclusion classe App
App::load();                        //Chargement application
ob_start();                         //Démarrage buffer

/** Gestion des vues **/
if (isset($_GET['p'])) {
    $page = $_GET['p'];
} else {
    $page = 'login';
}
switch ($page) {
    case 'login':
        require ROOT . '/pages/login/login.php';
        break;
    case 'login.cfa':
        require ROOT . '/pages/login/cfa.php';
        break;
    case 'login.rp':
        require ROOT . '/pages/login/rp.php';
        break;
    default:
        App::notFound();
        break;
}
/****/

$content = ob_get_clean();      //Enregistrement du contenu du buffer pour l'injecter dans le modèle
require ROOT . '/pages/templates/login.php';        //Appel du modèle

<?php
define('ROOT', dirname(__DIR__));
require ROOT . '/app/App.php';      //Inclusion classe App
App::load();                        //Chargement application

/** Vérifier si un utilisateur est connecté **/
$auth = new \Core\Auth\DBAuth(App::getInstance()->getDb());
if($auth->logged() === FALSE) {
    App::forbidden();
}
/****/

ob_start();     //Démarrage buffer

/** Récupération contrat **/
$user = App::getInstance()->getTable('Utilisateur')->find($_SESSION['auth']);
if($user->type !== 'apprenti') {
    if(!isset($_SESSION['contract'])){
        if(!isset($_GET['id_contrat'])) {
            header('Location:choixApprenti.php');
        } else {
            $_SESSION['contract'] = $_GET['id_contrat'];
        }
    }
    $contrat = App::getInstance()->getTable('ContratApprentissage')->find($_SESSION['contract']);
} else {
    $contrat = App::getInstance()->getTable('ContratApprentissage')->find($_SESSION['auth'], $user->type);
}
/****/

/** Gestion des vues **/
if (isset($_GET['p'])) {
    $page = $_GET['p'];
} else {
    $page = 'private';
}
switch ($page) {    //A améliorer (avec modèle MVC ?)
    case 'private':
        require ROOT . '/pages/private/private.php';
        break;
    case 'private.profile':
        require ROOT . '/pages/private/profile.php';
        break;
    case 'private.form':
        require ROOT . '/pages/private/form.php';
        break;
    case 'private.eval':
        require ROOT . '/pages/private/eval.php';
        break;
    case 'private.contrat':
        require ROOT . '/pages/private/contrat.php';
        break;
    case 'private.fichiers':
        require ROOT . '/pages/private/fichiers.php';
        break;
    case 'private.logout':
        $auth->logout();
        break;
    default:
        App::notFound();
        break;
}
/****/

$content = ob_get_clean();      //Enregistrement du contenu du buffer pour l'injecter dans le modèle
require ROOT . '/pages/templates/private.php';      //Appel du modèle

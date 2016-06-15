<?php
define('ROOT', dirname(__DIR__));
require ROOT . '/app/App.php';
App::load();
$auth = new \Core\Auth\DBAuth(App::getInstance()->getDb());
if($auth->logged() === FALSE) {
    App::forbidden();
}
ob_start();
$user = App::getInstance()->getTable('Utilisateur')->find($_SESSION['auth']);
if (isset($_GET['p'])) {
    $page = $_GET['p'];
} else {
    $page = 'choix';
}
switch ($page) {    //A améliorer (avec modèle MVC ?)
    case 'choix':
        require ROOT . '/pages/choixApprenti/choix.php';
        break;
    case 'choix.logout':
        $auth->logout();
        break;
    default:
        App::notFound();
        break;
}
$content = ob_get_clean();
require ROOT . '/pages/templates/choixApprenti.php';

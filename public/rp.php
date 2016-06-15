<?php
define('ROOT', dirname(__DIR__));
require ROOT . '/app/App.php';
App::load();
$auth = new \Core\Auth\DBAuth(App::getInstance()->getDb());
if($auth->logged() === FALSE) {
    App::forbidden();
}
ob_start();
if (isset($_GET['p'])) {
    $page = $_GET['p'];
} else {
    $page = 'rp';
}
switch ($page) {    //A améliorer (avec modèle MVC ?)
    case 'rp':
        require ROOT . '/pages/rp/rp.php';
        break;
    case 'rp.logout':
        $auth->logout();
        break;
    default:
        App::notFound();
        break;
}
$user = App::getInstance()->getTable('Utilisateur')->find($_SESSION['auth']);
$content = ob_get_clean();
require ROOT . '/pages/templates/rp.php';

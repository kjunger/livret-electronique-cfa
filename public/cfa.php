<?php
define('ROOT', dirname(__DIR__));
require ROOT . '/app/App.php';
App::load();
$auth = new \Core\Auth\DBAuth(App::getInstance()->getDb());
if($auth->logged() === FALSE) {
    App::forbidden();
}
if (isset($_GET['p'])) {
    $page = $_GET['p'];
} else {
    $page = 'cfa';
}
switch ($page) {    //A améliorer (avec modèle MVC ?)
    case 'cfa':
        require ROOT . '/pages/cfa/cfa.php';
        break;
    case 'cfa.logout':
        $auth->logout();
        break;
    default:
        App::notFound();
        break;
}
ob_start();
$user = App::getInstance()->getTable('Utilisateur')->find($_SESSION['auth']);
$content = ob_get_clean();
require ROOT . '/pages/templates/cfa.php';
ob_flush();

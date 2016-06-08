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
require ROOT . '/pages/choixApprenti/choix.php';
$content = ob_get_clean();
require ROOT . '/pages/templates/choixApprenti.php';
ob_flush();

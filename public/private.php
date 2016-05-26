<?php
define('ROOT', dirname(__DIR__));
require ROOT . '/app/App.php';
App::load();
if (isset($_GET['p'])) {
    $page = $_GET['p'];
} else {
    $page = 'private';
}
ob_start();
switch ($page) {
    case 'private':
        require ROOT . '/pages/private/private.php';
        break;
    case 'private.profile':
        require ROOT . '/pages/private/profile.php';
        break;
    case 'private.contrat':
        require ROOT . '/pages/private/contrat.php';
        break;
    case 'private.logout':
        $auth = new \Core\Auth\DBAuth(App::getInstance()->getDb());
        $auth->logout();
        break;
}
$content = ob_get_clean();
require ROOT . '/pages/templates/private.php';

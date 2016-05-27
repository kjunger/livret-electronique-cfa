<?php
define('ROOT', dirname(__DIR__));
require ROOT . '/app/App.php';
App::load();
if (isset($_GET['p'])) {
    $page = $_GET['p'];
} else {
    $page = 'login';
}
ob_start();
switch ($page) {
    case 'login':
        require ROOT . '/pages/login/login.php';
        break;
    default:
        App::notFound();
        break;
}
$content = ob_get_clean();
require ROOT . '/pages/templates/login.php';
ob_flush();

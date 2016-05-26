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
}
$content = ob_get_clean();
require ROOT . '/pages/templates/private.php';

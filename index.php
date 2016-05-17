<?php
session_start();
ob_start();
header('content-type: text/html; charset=utf-8');
if (isset($_SESSION['id'])) {
    include_once '_views/private.php';
}
else {
    include_once '_views/login.php';
}
ob_flush();
?>

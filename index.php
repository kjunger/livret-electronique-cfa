<?php
include('_classes/user.class.php');
include('_functions/db.functions.php');
session_start();
if (empty($_SESSION['user'])) {
    include ('_templates/login/login.php');
}
else {
    include ('_templates/default/default.php');
}
?>

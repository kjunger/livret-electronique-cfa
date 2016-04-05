<?php
session_start();
include('_functions/db.functions.php');

if (empty($_SESSION['login']) && empty($_SESSION['situation'])) {
    include ('_templates/login/login.php');

}
else {
    include ('_templates/default/default.php');

}

?>

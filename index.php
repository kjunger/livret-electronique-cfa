<?php
session_start();

if (empty($_SESSION['login']) && empty($_SESSION['situation'])) {
    include ('_templates/login/login.php');

}
else {
    include ('_templates/default/default.php');

}

?>

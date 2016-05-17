<?php
session_start();
if (isset($_POST['type'], $_POST['login'], $_POST['pass'])) {
    if (login_test($_POST['type'], $_POST['login'], md5($_POST['pass'])) == TRUE) {
        header('Location:../../index.php?private');
    }
    else {
        header('Location:../../index.php?error');
    }
}
else {
    header('Location:../../index.php?error');
}
function login_test($type, $login, $pass)
{
    require_once '../config.php';

    require_once '../classes/db.class.php';

    $db = new db("mysql:host=" . DB["host"] . ";port=" . DB["port"] . ";dbname=" . DB["name"], DB["user"], DB["pass"]);
    $db->setErrorCallbackFunction("echo");
    $attr = array(
        ":login" => "$login",
        ":type" => "$type",
        ":pass" => "$pass"
    );
    $search = $db->select("Utilisateur", "login = :login AND type = :type AND pass = :pass", $attr);
    if (count($search) == 1) {
        $_SESSION['id'] = $search[0]['idUtilisateur'];
        $_SESSION['type'] = $search[0]['type'];
        return TRUE;
    } //count( $search ) == 1
    else {
        return FALSE;
    }
}
?>

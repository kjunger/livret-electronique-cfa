<?php 
    session_start();
    include('_scripts/db_init.php');
    if(empty($_SESSION['login']) && empty($_SESSION['situation'])):
        header('Location:login.php');
    else:
        include('_templates/default.php');
    endif; 
?>
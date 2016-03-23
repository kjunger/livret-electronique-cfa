<?php 
    session_start();
    include('_includes/db_init.php');
    if(empty($_SESSION['login']) && empty($_SESSION['situation'])):
        header('Location:_includes/login.php');
    else:
        include('_templates/default.php');
    endif; 
?>
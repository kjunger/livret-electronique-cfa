<?php
    if(!empty($_GET['page'])){
        if(is_file('_controllers/'.$_GET['page'].'.php')){
            include('_controllers/'.$_GET['page'].'.php');
        }
    }
    else{
        include('_controllers/home.php');
    }
?>

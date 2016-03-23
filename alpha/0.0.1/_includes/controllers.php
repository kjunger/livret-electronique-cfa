<?php 
    if(!empty($_GET['cat']) && !empty($_GET['view'])){
        if(is_file('_views/'.$_GET['cat'].'/'.$_GET['view'].'.php')){
            include('_views/'.$_GET['cat'].'/'.$_GET['view'].'.php');
        }
        else{
            include('_views/404.php');
        }
    }
    else{
        include('_includes/accueil.php');
    }
?>
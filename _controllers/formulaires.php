<div class="section">
<?php if(!empty($_GET['view'])){
    if(is_file('_views/'.$_GET['view'].'.php')){
        include('_views/'.$_GET['view'].'.php');
    }
    else{
        include('_controllers/404.php');
    }
} ?>
</div>

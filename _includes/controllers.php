<nav class="grey lighten-5 blue-grey-text text-darken-4">
    <div class="row">
        <div class="col s12">
            <a href="#!" class="breadcrumb blue-grey-text text-darken-4"><?php echo $_GET['cat']; ?></a>
            <?php if(!empty($_GET['view'])){
                echo '<a href="#!" class="breadcrumb blue-grey-text text-darken-4">'.$_GET['view'].'</a>';
            } ?>
        </div>
    </div>
</nav>
<div class="section">
<?php if(!empty($_GET['view'])){
    if(is_file('_views/'.$_GET['cat'].'/'.$_GET['view'].'.php')){
        include('_views/'.$_GET['cat'].'/'.$_GET['view'].'.php');
    }
    else{
        include('_controllers/404.php');
    }
}
else{
    include('_view/'.$_GET['cat']._root.php');
}?>
</div>

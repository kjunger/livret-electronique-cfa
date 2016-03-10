<nav>
    <div class="row">
        <div class="col s12">
            <a href="#!" class="breadcrumb grey lighten-5"><?php echo $_GET['control']; ?></a>
            <?php if(!empty($_GET['view'])){
                echo '<a href="#!" class="breadcrumb grey lighten-5">'.$_GET['view'].'</a>';
            } ?>
        </div>
    </div>
</nav>
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

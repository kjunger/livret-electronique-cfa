<nav>
    <div class="card grey lighten-5">
        <div class="col s12">
            <a href="#!" class="breadcrumb"><?php echo $_GET['control']; ?></a>
            <?php if(!empty($_GET['view'])){
                echo '<a href="#!" class="breadcrumb">'.$_GET['view'].'</a>';
            } ?>
        </div>
    </div>
</nav>
<?php
    echo 'Evaluation';
    if(!empty($_GET['view'])){
        if(is_file('_views/'.$_GET['view'].'.php')){
            include('_views/'.$_GET['view'].'.php');
        }
        else{
            include('_controllers/404.php');
        }
    }
?>

<nav class="grey lighten-5 blue-grey-text text-darken-4">
    <div class="row">
        <div class="col s12">
            <a href="#!" class="breadcrumb blue-grey-text text-darken-4"><?php echo $_GET['control']; ?></a>
            <?php if(!empty($_GET['view'])){
                echo '<a href="#!" class="breadcrumb blue-grey-text text-darken-4">'.$_GET['view'].'</a>';
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

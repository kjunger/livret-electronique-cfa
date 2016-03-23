<p id="breadcrumbs">
    <?php if(!empty($_GET['cat'])){
        echo '<a href="index.php?cat='.$_GET['cat'].'">'.$_GET['cat'].'</a> > ';
        if(!empty($_GET['view'])){
            echo '<a href="index.php?cat='.$_GET['cat'].'&view='.$_GET['view'].'">'.$_GET['view'].'</a>';
        }
    }
    else{
        echo '<a href="index.php">Accueil</a> > ';
    } ?>
</p>
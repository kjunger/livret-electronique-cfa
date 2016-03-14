<nav class="grey lighten-5 blue-grey-text text-darken-4">
    <div class="row">
        <div class="col s12">
            <?php echo '<a href="index.php?cat='.$_GET['cat'].'" class="breadcrumb blue-grey-text text-darken-4">'.$_GET['cat'].'</a>'; ?>
            <?php if(!empty($_GET['view'])){
                echo '<a href="index.php?cat='.$_GET['cat'].'&view='.$_GET['view'].'" class="breadcrumb blue-grey-text text-darken-4">'.$_GET['view'].'</a>';
            } ?>
        </div>
    </div>
</nav>
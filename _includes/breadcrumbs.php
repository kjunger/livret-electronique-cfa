<div>
    <?php echo '<a href="index.php?cat='.$_GET['cat'].'">'.$_GET['cat'].'</a>'; ?>
    <?php if(!empty($_GET['view'])){
        echo '<a href="index.php?cat='.$_GET['cat'].'&view='.$_GET['view'].'">'.$_GET['view'].'</a>';
    } ?>
</div>
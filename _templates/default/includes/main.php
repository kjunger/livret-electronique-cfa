<div id="main">
    <p id="breadcrumbs">
        <?php
            if (!empty($_GET['cat']) && !empty($_GET['slug']))
            {
                displayBreadcrumbs($db, $_GET['cat'], $_GET['slug']);
            }
            else
            {
                echo '<a href="index.php">Accueil</a> > ';
            }
        ?>
    </p>
    <?php
        if (!empty($_GET['slug']))
        {
            include('_views/form/' . $_GET['slug'] . '.php');
        }
        else
        {
            include ('_templates/default/includes/home.php');
        }
    ?>
</div>

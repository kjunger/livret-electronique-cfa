<div id="main">
    <p id="breadcrumbs">
        <?php
            echo '<a href="index.php">Accueil</a> > ';
            if (isset($_GET['cat']) && isset($_GET['slug']))
            {
                displayBreadcrumbs($db, $_GET['cat'], $_GET['slug']);
            }
        ?>
    </p>
    <?php
        if (isset($_GET['cat']) && isset($_GET['slug']))
        {
            include('_views/default/' . $_GET['cat'] . '/' . $_GET['slug'] . '.php');
        }
        else
        {
            include ('_templates/default/includes/home.php');
        }
    ?>
</div>

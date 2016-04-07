<main>
    <p id="breadcrumbs">
        <?php

        if (!empty($_GET['cat']) && !empty($_GET['slug'])) {
            displayBreadcrumbs($db, $_GET['cat'], $_GET['slug']);
        }
        else {
            echo '<a href="index.php">Accueil</a> > ';
        }

        ?>
    </p>
    <?php

    if (!empty($_GET['slug'])) {
        viewController($db, $_GET['slug']);
    }
    else {
        include('_templates/default/includes/home.php');
    }

    ?>
</main>

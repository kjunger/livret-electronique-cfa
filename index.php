<?php session_start(); include('_includes/db_init.php'); //Initialisation de la connexion à la DB ?>
<!DOCTYPE html>
<html lang="fr">
    <head>
    <?php include('_includes/head.php'); //Section HEAD du code HTML ?>
    </head>
    <body>
        <header>
            <?php include('_includes/header.php'); //Section HEADER du code HTML ?>
        </header>
        <main>
            <aside>
                Future sidebar de navigation
            </aside>
            <div>
                <?php include('_includes/controllers.php'); //Gestion des controlleurs pour l'affichage des pages du site ?>
            </div>
        </main>
        <footer>
            <?php include('_includes/footer.php'); //Section FOOTER du code HTML ?>
        </footer>
    </body>
    <?php include('_includes/scripts.php'); //Inclusion des scripts JavaScript ?>
</html>

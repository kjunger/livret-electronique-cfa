<?php 
    session_start();
    include('_includes/db_init.php'); //Initialisation de la connexion à la DB 
    if(empty($_SESSION['login']) && empty($_SESSION['situation'])):      //Directives pour la connexion d'utilisateurs
        include('_includes/login.php');
    else:
?>
    <!DOCTYPE html>
    <html lang="fr">

    <head>
        <?php include('_includes/head.php'); //Section HEAD du code HTML ?>
            <?php include('_includes/scriptsBefore.php'); //Inclusion des scripts JavaScript devant être chargés en premier (p.ex. jQuery) ?>
    </head>

    <body>
        <!--<form action="_scripts/scriptLogout.php" method="post"><input type="submit" name="disconnect" value="Se déconnecter"></form>--> <!--Bouton de déconnexion à placer-->
        <header>
            <?php include('_includes/header.php'); //Section HEADER du code HTML ?>
        </header>
        <nav id="cssmenu">
            <?php include('_includes/sidebar.php'); //Menu principal ?>
        </nav>
        <main>
            <?php include('_includes/controllers.php'); //Gestion des controlleurs pour l'affichage des pages du site ?>
        </main>
        <footer>
            <?php include('_includes/footer.php'); //Section FOOTER du code HTML ?>
        </footer>
    </body>
    <?php include('_includes/scriptsAfter.php'); //Inclusion des scripts JavaScript pouvant être chargés en dernier ?>

    </html>
<?php endif; ?>
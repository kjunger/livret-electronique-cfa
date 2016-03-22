<?php 
    session_start();
    include('_includes/db_init.php');
    if(empty($_SESSION['login']) && empty($_SESSION['situation'])):
        header('Location:_includes/login.php');
    else:
?>
    <!DOCTYPE html>
    <html lang="fr">

    <head>
        <?php include('_includes/head.php'); ?>
            <?php include('_includes/scriptsBefore.php'); ?>
    </head>

    <body>
        <header>
            <?php include('_includes/header.php'); ?>
        </header>
        <nav id="cssmenu">
            <?php include('_includes/sidebar.php'); ?>
        </nav>
        <main>
            <?php include('_includes/controllers.php'); ?>
        </main>
        <footer>
            <?php include('_includes/footer.php'); ?>
        </footer>
    </body>
    <?php include('_includes/scriptsAfter.php'); ?>

    </html>
<?php endif; ?>
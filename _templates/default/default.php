<?php
include ('_templates/default/functions.php');

$db = dbInit('livretelectronique', 'localhost', 'root', '');

if (isset($_GET['logout'])) {
    userLogout();
}

?>
    <!DOCTYPE html>
    <html lang="fr">

    <head>
        <title>Livret Electronique de Suivi de l'Apprenti - Université de Rouen</title>
        <meta charset="utf-8" />
        <link type="text/css" rel="stylesheet" href="_templates/default/assets/css/style.css" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <script type="application/javascript" src="_templates/default/assets/js/jquery-2.2.1.min.js"></script>
    </head>

    <body>
        <?php
        include('_templates/default/includes/header.php');
        include('_templates/default/includes/navigation.php');
        include('_templates/default/includes/main.php');
        include('_templates/default/includes/footer.php');
        ?>
    </body>
    <script type="application/javascript" src="_templates/default/assets/js/btnConnexion.js"></script>

    </html>

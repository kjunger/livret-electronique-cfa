<?php
include ('_templates/default/functions.php');

$db = dbInit('LivretElectroniq', '10.0.2.15', 'LivretElectroniq', 'test');

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
        <script type="text/javascript" src="_templates/default/assets/js/jquery-2.2.1.min.js"></script>
        <script type="text/javascript" src="_templates/default/assets/js/script.js"></script>
    </head>

    <body>
        <?php
        include('_templates/default/includes/navigation.php');
        include('_templates/default/includes/user-mobile.php');
        ?>
        <div class="screen">
            <?php
            include('_templates/default/includes/header.php');
            include('_templates/default/includes/main.php');
            include('_templates/default/includes/footer.php');
            ?>
        </div>
    </body>

    </html>

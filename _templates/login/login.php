<?php
    include('_templates/login/functions.php');

    if (isset($_GET['login'])) {

        $db = dbInit('livretelectronique', 'localhost', 'root', '');

        if (isset($_POST['situation'])) {
            if (isset($_POST['login'])) {
                if (isset($_POST['mdp'])) {

                    userLogin($_POST['login'], $_POST['mdp'], $_POST['situation'], $db);
                }
            }
        }
    }
?>
    <!DOCTYPE html>
    <html lang="fr">

    <head>
        <title>Livret Electronique de Suivi de l'Apprenti - Université de Rouen</title>
        <meta charset="utf-8" />
        <link type="text/css" rel="stylesheet" href="_templates/login/assets/css/styleLogin.css" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    </head>

    <body>
        <?php include('_templates/login/includes/main.php'); ?>
    </body>

    </html>

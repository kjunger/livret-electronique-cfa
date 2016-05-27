<?php
header('content-type: text/html; charset=utf-8');
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Page introuvable !</title>
        <link type="text/css" rel="stylesheet" href="css/40x.min.css" />
        <script type="text/javascript" src="https://code.jquery.com/jquery-1.12.3.min.js"></script>
        <script type="text/javascript" src="js/script.js"></script>
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    </head>
    <body>
        <img src="img/404.png" alt="logo" />
        <div id="content">
            <form action="../index.php">
                <input type="submit" value="Retour à l'accueil" />
            </form>
        </div>
    </body>
</html>

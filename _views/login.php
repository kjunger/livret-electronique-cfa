<?php
require_once '_core/config.php';    //Contient les différentes variables pour la configuration de base
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Veuillez vous connecter</title>
        <link type="text/css" rel="stylesheet" href="<?php echo VIEW_DIR; ?>/assets/login/style.css" />
        <script type="text/javascript" src="https://code.jquery.com/jquery-1.12.3.min.js"></script>
        <script type="text/javascript" src="<?php echo VIEW_DIR; ?>/assets/login/js/classie.js"></script>
        <script type="text/javascript" src="<?php echo VIEW_DIR; ?>/assets/login/js/fancySelect.js"></script>
        <script type="text/javascript" src="<?php echo VIEW_DIR; ?>/assets/login/js/script.js"></script>
        <script type="text/javascript">
          $(document).ready(function(){
            $('.basic').fancySelect();
          });
        </script>
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    </head>
    <body>
        <img src="<?php echo VIEW_DIR; ?>/assets/login/lesa.png" alt="logo" />
        <div id="content">
            <h2>Bienvenue, <span>veuillez vous connecter.</span></h2>
            <form method="post" action="<?php echo FUNC_DIR; ?>/login_process.php">
                <select class="basic" name="type" required>
                    <option value="default" selected disabled>Sélectionnez votre situation</option>
                    <option value="apprenti">Apprenti(e)</option>
                    <option value="maitreapprentissage">Maître d'apprentissage</option>
                    <option value="tuteurpedagogique">Tuteur pédagogique</option>
                </select>
                <input placeholder="Login" name="login" type="text" required />
                <input placeholder="Mot de passe" name="pass" type="password" required />
                <input type="submit" value="Connexion" />
            </form>
            <div class="error">
                <?php 
                if ( isset( $_GET[ 'error' ] ) ) {
                        echo "L'identification a échoué. Veuillez réessayer."; 
                } 
                ?>
            </div>
        </div>
    </body>
</html>

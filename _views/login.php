<?php
require_once '_core/config.php';
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Veuillez vous connecter</title>
        <link type="text/css" rel="stylesheet" href="<?php echo VIEW_DIR; ?>/assets/login/style.css" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
    </head>
    <body>
        <img src="<?php echo VIEW_DIR; ?>/assets/login/lesa.png" alt="logo" />
        <div id="content">
            <h2>Bienvenue, <span>veuillez vous connecter.</span></h2>
            <form method="post" action="<?php echo FUNC_DIR; ?>/login_process.php">
                <select name="type" required>
                    <option value="default" selected disabled>Sélectionnez votre situation</option>
                    <option value="apprenti">Apprenti(e)</option>
                    <option value="maitreapprentissage">Maître d'apprentissage</option>
                    <option value="tuteurpedagogique">Tuteur pédagogique</option>
                </select>
                <input placeholder="Login" name="login" type="text" required />
                <input placeholder="Mot de passe" name="pass" type="password" required />
                <p class="btn">
                    <input type="submit" value="Valider" />
                </p>
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

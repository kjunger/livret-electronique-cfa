<?php
const INCLUDES = 'includes/private';
const ASSETS = 'assets/private';
require_once '_core/config.php';
require_once CLSS_DIR . '/user.class.php';
require_once CLSS_DIR . '/phpQuery.class.php';
require_once CLSS_DIR . '/form.class.php';
$user = new $_SESSION[ 'type' ]( DB, $_SESSION[ 'id' ] );
$forms = new form( $user );
$userInfo = $user->returnUser();
$userForms = $forms->returnFormList();
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <title>Livret Electronique de Suivi de l'Apprenti - Université de Rouen</title>
    <meta charset="utf-8" />
    <link type="text/css" rel="stylesheet" href="<?php echo VIEW_DIR . '/' . ASSETS; ?>/css/style.css" />
    <script type="text/javascript" src="https://code.jquery.com/jquery-1.12.3.min.js">
    </script>
    <script type="text/javascript" src="<?php echo VIEW_DIR . '/' . ASSETS; ?>/js/script.js">
    </script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
</head>
<body>
    <?php
        include_once VIEW_DIR . '/' . INCLUDES . '/navigation.php';
        include_once VIEW_DIR . '/' . INCLUDES . '/user-mobile.php';
    ?>
    <div class="screen">
        <?php
            include_once VIEW_DIR . '/' . INCLUDES . '/header.php';
            include_once VIEW_DIR . '/' . INCLUDES . '/main.php';
            include_once VIEW_DIR . '/' . INCLUDES . '/footer.php';
        ?>
    </div>
</body>
</html>
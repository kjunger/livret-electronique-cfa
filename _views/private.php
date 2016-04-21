<?php
    require_once '_core/config.php';
    require_once CLSS_DIR . '/user.class.php';
    session_start();
    $user = new $_SESSION['type'](DB, $_SESSION['id']);
    $userInfo = $user->getUser();
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <title>Livret Electronique de Suivi de l'Apprenti - Université de Rouen</title>
    <meta charset="utf-8" />
    <link type="text/css" rel="stylesheet" href="<?php echo VIEW_DIR; ?>/assets/private/css/style.css" />
    <script type="text/javascript" src="https://code.jquery.com/jquery-1.12.3.min.js">
    </script>
    <script type="text/javascript" src="<?php echo VIEW_DIR; ?>/assets/private/js/script.js">
    </script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
</head>
<body>
    <?php
        include_once(VIEW_DIR . '/includes/private/navigation.php');
        include_once(VIEW_DIR . '/includes/private/user-mobile.php');
    ?>
    <div class="screen">
        <?php
            include_once(VIEW_DIR . '/includes/private/header.php');
            include_once(VIEW_DIR . '/includes/private/main.php');
            include_once(VIEW_DIR . '/includes/private/footer.php');
        ?>
    </div>
</body>
</html>
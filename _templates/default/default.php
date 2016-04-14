<?php
    include ('_templates/default/functions/display.functions.php');
    include ('_templates/default/functions/user.functions.php');
    $db = dbInit('LivretElectroniq', '127.0.0.1', 'LivretElectroniq', 'test');
    $_SESSION['userInfos'] = userGetAllInfos($_SESSION['user']);
    if (isset($_GET['logout'])) {
        userLogout();
    }
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <?php include('_templates/default/includes/head.php'); ?>
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

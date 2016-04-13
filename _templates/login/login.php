<?php
    if (isset($_POST['situation']) && isset($_POST['login']) && isset($_POST['mdp'])) {
        $db = dbInit('LivretElectroniq', '127.0.0.1', 'LivretElectroniq', 'test');
        $_SESSION['user'] = login($db);
        if ($_SESSION['user'] == FALSE) {
            header('Location:index.php?error');
        } else {
            header('Location:index.php');
        }
    }
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <?php include('_templates/login/includes/head.php'); ?>
</head>
<body>
    <?php include('_templates/login/includes/content.php'); ?>
</body>
</html>

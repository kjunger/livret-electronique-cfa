<?php
    $auth = new \Core\Auth\DBAuth(App::getInstance()->getDb());
    if(!empty($_POST)){
        if ($auth->status($_POST['login'], "cfa")) {
            if ($auth->login($_POST['login'], $_POST['pass'])) {
                $_SESSION['status'] = 'cfa';
                header('Location:cfa.php');
            } else {
                ?>
                <h2>Identifiants incorrects !</h2>
                <?php
            }
        }
        else {
            ?>
            <h2>Mauvais type d'utilisateur !</h2>
            <?php
        }
    }
?>
<a href="login.php">Retour à l'accès normal</a>
<img src="img/lesa.png" alt="logo" />
<div id="content">
    <h2>Accès réservé aux conseillers et assistants formation du CFA</h2>
    <form method="post" action="">
       <input placeholder="Identifiant" name="login" type="text" required />
       <input placeholder="Mot de passe" name="pass" type="password" required />
       <input type="submit" value="Connexion" />
    </form>
</div>

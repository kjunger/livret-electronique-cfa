<?php
    $auth = new \Core\Auth\DBAuth(App::getInstance()->getDb());
    if($auth->logged()){
        if(isset($_SESSION['status'])){
            header('Location:'.$_SESSION['status'].'.php');
        } else {
            header('Location:private.php');
        }
    }
    if(!empty($_POST)){
        if ($auth->login($_POST['login'], $_POST['pass'])) {
            header('Location:private.php');
        }
        else {
            ?>
            <h2>Identifiants incorrects !</h2>
            <?php
        }
    }
?>
<a href="?p=login.cfa">Accès CFA</a>
<a href="?p=login.rp">Accès Responsables pédagogiques</a>
<img src="img/lesa.png" alt="logo" />
<div id="content">
    <h2>Bienvenue, <span>veuillez vous connecter.</span></h2>
    <form method="post" action="">
       <input placeholder="Identifiant" name="login" type="text" required />
       <input placeholder="Mot de passe" name="pass" type="password" required />
       <input type="submit" value="Connexion" />
    </form>
</div>

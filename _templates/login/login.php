<?php if (isset($_GET['login'])) {
    session_start();
    $host = '127.0.0.1';
    $dbname = 'portfolio';
    $user = 'root';
    $pwd = '';
    try {
        $db = new PDO("mysql:dbname=$dbname;host=$host", $user, $pwd);
    }

    catch (PDOException $e) {
        echo 'Impossible de se connecter à la base de données : ' . $e->getMessage();
    }

    if (isset($_POST['situation'])) {
        if (isset($_POST['login'])) {
            if (isset($_POST['mdp'])) {
                switch ($_POST['situation']) {
                    case "apprenti":
                        try {
                            $connect = $db->query("select * from apprenti where loginApprenti='" . $_POST['login'] . "' and mdpApprenti='" . md5($_POST['mdp']) . "';");
                            $answer = $connect->fetchAll();
                        }

                        catch (PDOException $e) {
                            echo 'Erreur de transaction : ' . $e->getMessage();
                        }

                        if (count($answer) == 1) {
                            $_SESSION['login'] = $answer[0]['loginApprenti'];
                            $_SESSION['situation'] = $_POST['situation'];
                            header('Location:index.php');
                        }
                        else {
                            header('Location:index.php?error');
                        }

                        break;

                    case "maitreapprentissage":
                        try {
                            $connect = $db->query("select * from maitreapprentissage where loginMaitreApprentissage='" . $_POST['login'] . "' and mdpMaitreApprentissage='" . md5($_POST['mdp']) . "';");
                            $answer = $connect->fetchAll();
                        }

                        catch (PDOException $e) {
                            echo 'Erreur de transaction : ' . $e->getMessage();
                        }

                        if (count($answer) == 1) {
                            $_SESSION['login'] = $answer[0]['loginMaitreApprentissage'];
                            $_SESSION['situation'] = $_POST['situation'];
                            header('Location:index.php');
                        }
                        else {
                            header('Location:index.php?error');
                        }

                        break;

                    case "tuteurpedagogique":
                        try {
                            $connect = $db->query("select * from tuteurpedagogique where loginTuteurPedagogique='" . $_POST['login'] . "' and mdpTuteurPedagogique='" . md5($_POST['mdp']) . "';");
                            $answer = $connect->fetchAll();
                        }

                        catch (PDOException $e) {
                            echo 'Erreur de transaction : ' . $e->getMessage();
                        }

                        if (count($answer) == 1) {
                            $_SESSION['login'] = $answer[0]['loginTuteurPedagogique'];
                            $_SESSION['situation'] = $_POST['situation'];
                            header('Location:index.php');
                        }
                        else {
                            header('Location:index.php?error');
                        }

                        break;
                }
            }
        }
    }
} ?>
    <!DOCTYPE html>
    <html lang="fr">

    <head>
        <title>Livret Electronique de Suivi de l'Apprenti - Université de Rouen</title>
        <meta charset="utf-8" />
        <link type="text/css" rel="stylesheet" href="_templates/login/assets/css/styleLogin.css" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    </head>

    <body>
        <img src="_templates/login/assets/img/lesa.png" alt="logo" />
        <div id="content">
            <h2>Bienvenue, <span>veuillez vous connecter.</span></h2>
            <form method="post" action="index.php?login=1">
                <select name="situation" required>
                    <option value="default" selected disabled>Sélectionnez votre situation</option>
                    <option value="apprenti">Apprenti(e)</option>
                    <option value="maitreapprentissage">Maître d'apprentissage</option>
                    <option value="tuteurpedagogique">Tuteur pédagogique</option>
                </select>
                <input placeholder="Login" name="login" type="text" required />
                <input placeholder="Mot de passe" name="mdp" type="password" required />
                <p class="btn">
                    <input type="submit" value="Valider" />
                </p>
            </form>
            <div class="error">
                <?php
                if (isset($_GET['error'])) {
                    echo "L'identification a échoué. Veuillez réessayer.";
                }
            ?>
            </div>
        </div>
    </body>

    </html>

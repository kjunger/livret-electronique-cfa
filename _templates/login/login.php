<?php   //Script préliminaire pour le bon déroulement de l'affichage
    if (isset($_GET['login'])) {
        session_start();

        /* Initialisation de la connexion à la base de données */
        try{    //tentative de connexion à la base de données
            $db=new PDO('mysql:dbname=portfolio;host=127.0.0.1','root','');     //où resp. le nom de la BDD (ici, portfolio), l'adresse du serveur de BDD (ici, 127.0.0.1), l'utilisateur de la BDD (ici, root) et le mot de passe (ici, rien du tout) doivent être remplacés par les valeurs adéquates le cas échéant
        } catch(PDOException $e){   //si la tentative de connexion échoue
            echo 'Impossible de se connecter à la base de données : '.$e->getMessage();     //récupération et affichage du message d'erreur
        }

        /* Gestion de la connexion */

        if (isset($_POST['situation'])) {           // Vérification des différentes variables $_POST
            if (isset($_POST['login'])) {           // pour déterminer si l'utilisateur
                if (isset($_POST['mdp'])) {         // a bien renseigné tout le formulaire de connexion
                    switch ($_POST['situation']) {      // Détermination du type d'utilisateur
                        case "apprenti":    // S'il s'agit d'un apprenti
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

                        case "maitreapprentissage":     // S'il s'agit d'un maître d'apprentissage
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

                        case "tuteurpedagogique":       // S'il s'agit d'un tuteur pédagogique
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
    }
?>
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

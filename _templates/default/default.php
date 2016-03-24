<?php
    if(isset($_GET['logout'])){
        unset($_SESSION['login']);
        unset($_SESSION['situation']);
        session_destroy();
        header('Location:index.php'); 
    }
    $host='127.0.0.1';
    $dbname='portfolio';
    $user='root';
    $pwd='';
    try{
        $db=new PDO("mysql:dbname=$dbname;host=$host",$user,$pwd);
    } catch(PDOException $e){
        echo 'Impossible de se connecter à la base de données : '.$e->getMessage();
    }
?>
    <!DOCTYPE html>
    <html lang="fr">

    <head>
        <title>Livret Electronique de Suivi de l'Apprenti - Université de Rouen</title>
        <meta charset="utf-8" />
        <link type="text/css" rel="stylesheet" href="_templates/default/assets/css/style.css" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <script type="application/javascript" src="_templates/default/assets/js/jquery-2.2.1.min.js"></script>
    </head>

    <body>
        <header>
            <div class="bouton">
                <img src="_templates/default/assets/icons/bouton.svg" alt="" />
            </div>
            <a href="index.php"><img src="_templates/default/assets/img/header/logo.png" alt="Logo CFA-CFC" id="header-logo" /></a>
            <p>Bienvenue,
                <br/>
                <?php
            switch($_SESSION['situation']){
                case "apprenti":
                    $name=$db->query("select prenomApprenti, nomApprenti from apprenti where loginApprenti='".$_SESSION['login']."';");
                    $answer=$name->fetchAll();
                    if(count($answer)==1){
                        echo '<span id="nom">'.$answer[0]['prenomApprenti'].' '.$answer[0]['nomApprenti'].'</span>';
                    }
                    break;
                case "maitreapprentissage":
                    $name=$db->query("select prenomMaitreApprentissage, nomMaitreApprentissage from maitreapprentissage where loginMaitreApprentissage='".$_SESSION['login']."';");
                    $answer=$name->fetchAll();
                    if(count($answer)==1){
                        echo '<span id="nom">'.$answer[0]['prenomMaitreApprentissage'].' '.$answer[0]['nomMaitreApprentissage'].'</span>';
                    }
                    break;
                case "tuteurpedagogique":
                    $name=$db->query("select prenomTuteurPedagogique, nomTuteurPedagogique from tuteurpedagogique where loginTuteurPedagogique='".$_SESSION['login']."';");
                    $answer=$name->fetchAll();
                    if(count($answer)==1){
                        echo '<span id="nom">'.$answer[0]['prenomTuteurPedagogique'].' '.$answer[0]['nomTuteurPedagogique'].'</span>';
                    }
                    break;
            }
        ?></p>
            <div id="user">
                <img src="_templates/default/assets/icons/user.svg" alt="" />
            </div>
            <div id="deconnexion" class="">
                <ul class="hidden">
                    <li>
                        <a href=""><img src="_templates/default/assets/icons/form.svg" alt="" />Profil</a>
                    </li>
                    <li class="separateur">-</li>
                    <li>
                        <a href="index.php?logout=1"><img src="_templates/default/assets/icons/form.svg" alt="" />Deconnexion</a>
                    </li>
                </ul>
            </div>
        </header>
        <nav id="cssmenu">
            <ul>
                <li>
                    <a href="index.php" id="actif"><img src="_templates/default/assets/icons/accueil.svg" alt="Accueil" class="icn" />Accueil</a>
                </li>
                <li>
                    <a href="index.php?cat=eval"><img src="_templates/default/assets/icons/eval.svg" alt="Evaluation" class="icn" />Evaluation</a>
                </li>
                <li class="has-sub">
                    <a href="#"><img src="_templates/default/assets/icons/form.svg" alt="Formulaires" class="icn" />Formulaires</a>
                    <ul>
                        <?php
                            try {
                                $formLinks = $db->query("select * from forms where catForm='form';");
                                $answer = $formLinks->fetchAll();
                            }

                            catch (PDOException $e) {
                                echo 'Erreur de transaction : ' . $e->getMessage();
                            }

                            foreach ($answer as $row) {
                                echo '<li><a href="index.php?cat=' . $row['catForm'] . '&amp;id=' . $row['idForm'] . '">' . $row['nomForm'] . '</a></li>';
                            }
                        ?>
                    </ul>
                </li>
                <li>
                    <a href="index.php?cat=contrat"><img src="_templates/default/assets/icons/contrat.svg" alt="Contrat" class="icn" />Contrat</a>
                </li>
                <li>
                    <a href="index.php?cat=fichiers"><img src="_templates/default/assets/icons/fichiers.svg" alt="Fichiers" class="icn" />Fichiers</a>
                </li>
                <li>
                    <a href="index.php?cat=contacts"><img src="_templates/default/assets/icons/contacts.svg" alt="Contacts" class="icn" />Contacts</a>
                </li>
            </ul>
        </nav>
        <main>
            <p id="breadcrumbs">
                <?php
                    if (!empty($_GET['cat']) && !empty($_GET['id'])) {

                        switch ($_GET['cat']) {
                            case "form":
                                echo 'Formulaires > ';
                                break;
                        }

                        try {
                            $formName = $db->query('select nomForm from froms where idForm=' . $_GET['id'] . ';');
                            $answer = $formName->fetchAll();
                        }

                        catch (PDOException $e) {
                            echo 'Erreur de transaction : ' . $e->getMessage();
                        }

                        if (count($answer) == 1){
                            echo $answer[0]['nomForm'];
                        }

                    } else {
                        echo '<a href="index.php">Accueil</a> > ';
                    }
                ?>
            </p>
            <?php
                if (!empty($_GET['id'])) {
                    try {
                        $form = $db->query('select contentForm from forms where idForm=' . $_GET['id'] . ';');
                        $answer = $form->fetchAll();
                    }

                    catch(PDOException $e) {
                        echo 'Erreur de transaction : ' . $e->getMessage();
                    }

                    if (count($answer) == 1) {
                        echo $answer[0]['contentForm'];
                    }
                    else {
                        include ('_views/404.php');

                    }
                }
                else {
                    include ('_views/accueil.php');

                }
            ?>
        </main>
        <footer>
            <img src="_templates/default/assets/img/footer/logo_univ_rouen.png" alt="Logo de l'Université de Rouen" id="logo_univ" />
            <img src="_templates/default/assets/img/footer/logo_iut_rouen.png" alt="Logo de l'IUT de Rouen" id="logo_etab" />
            <ul>
                <li><a href="#">Contact</a></li>
                <li><a href="#">Mentions légales</a></li>
            </ul>
            <img src="_templates/default/assets/img/footer/logo_region.png" alt="Logo de la région" id="logo_region" />
            <img src="_templates/default/assets/img/footer/logo_ministere.png" alt="Logo du Ministère de l'Enseignement Supérieur et de la Recherche" id="logo_ministere" />
        </footer>
    </body>
    <script type="application/javascript" src="_templates/default/assets/js/btnConnexion.js"></script>

    </html>

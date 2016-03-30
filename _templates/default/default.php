<?php
include ('_templates/default/functions.php');

$db = dbInit('livretelectronique', 'localhost', 'root', '');

if (isset($_GET['logout'])) {
    userLogout();
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
                <br/><span id="nom"><?php userName($db, $_SESSION['login'], $_SESSION['situation']); ?></span></p>
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
                    <a href="index.php" id="<?php if (!isset($_GET['cat'])) { echo 'actif'; } ?>"><img src="_templates/default/assets/icons/accueil.svg" alt="Accueil" class="icn" />Accueil</a>
                </li>
                <li>
                    <a href="index.php?cat=eval" id="<?php if (isset($_GET['cat']) && $_GET['cat']=='eval') { echo 'actif'; } ?>"><img src="_templates/default/assets/icons/eval.svg" alt="Evaluation" class="icn" />Evaluation</a>
                </li>
                <li class="has-sub">
                    <a href="#" id="<?php if (isset($_GET['cat']) && $_GET['cat']=='form') { echo 'actif'; } ?>"><img src="_templates/default/assets/icons/form.svg" alt="Formulaires" class="icn" />Formulaires</a>
                    <ul>
                        <?php subLinks($db, 'form'); ?>
                    </ul>
                </li>
                <li>
                    <a href="index.php?cat=contrat" id="<?php if (isset($_GET['cat']) && $_GET['cat']=='contrat') { echo 'actif'; } ?>"><img src="_templates/default/assets/icons/contrat.svg" alt="Contrat" class="icn" />Contrat</a>
                </li>
                <li>
                    <a href="index.php?cat=fichiers" id="<?php if (isset($_GET['cat']) && $_GET['cat']=='fichiers') { echo 'actif'; } ?>"><img src="_templates/default/assets/icons/fichiers.svg" alt="Fichiers" class="icn" />Fichiers</a>
                </li>
            </ul>
        </nav>
        <main>
            <p id="breadcrumbs">
                <?php

                if (!empty($_GET['cat']) && !empty($_GET['slug'])) {
                    breadcrumbs($db, $_GET['cat'], $_GET['slug']);
                }
                else {
                    echo '<a href="index.php">Accueil</a> > ';
                }

                ?>
            </p>
            <?php

            if (!empty($_GET['slug'])):
                controller($db, $_GET['slug']);
            else:

            ?>
            <div class="conteneur">
                <div class="titre">
                    <h1>Informations générales</h1>
                </div>
                <div class="contenu">
                    <?php homeGeneralInfos($db, $_SESSION['login'], $_SESSION['situation']); ?>
                        <h2>Tuteur pédagogique</h2>
                        <p>
                            <?php
                                try {
                                    $tuteurPedagogique = $db->query("SELECT `tuteurpedagogique`.`nomTuteurPedagogique`,`tuteurpedagogique`.`prenomTuteurPedagogique` FROM `tuteurpedagogique` INNER JOIN (`contratapprentissage` INNER JOIN `apprenti` ON `contratapprentissage`.`idApprenti`=`apprenti`.`idApprenti`) ON `tuteurpedagogique`.`idTuteurPedagogique`=`contratapprentissage`.`idTuteurPedagogique` WHERE `apprenti`.`loginApprenti`='" . $_SESSION['login'] . "';");
                                    $answer = $tuteurPedagogique->fetchAll();
                                } catch (PDOException $e) {
                                    echo 'Erreur de transaction : ' . $e->getMessage();
                                }
                                if (count($answer) == 1) {
                                    echo $answer[0]['prenomTuteurPedagogique'] . ' ' . $answer[0]['nomTuteurPedagogique'];
                                }
                            ?>
                        </p>
                </div>
            </div>
            <div class="conteneur">
                <div class="titre">
                    <h1>Important</h1>
                </div>
                <div class="contenu">
                    <h2>Formulaire à remplir</h2>
                    <p>
                        Vous devez compléter le formulaire suivant :
                        <br/> "Retour d'expérience"
                        <br/>
                        <span class="info">Date limite : 05/09/20xx</span>
                    </p>
                    <h2>Formulaire à remplir</h2>
                    <p>
                        Vous devez compléter le formulaire suivant :
                        <br/> "Insertion professionnelle et suivi des diplômés"
                        <br/>
                        <span class="info">Date limite : 05/09/20xx</span>
                    </p>
                    <h2>Contrat pédagogique</h2>
                    <p>
                        Vous devez imprimer et faire signer votre contrat pédagogique.
                        <br/>
                        <span class="info">Date limite : 02/10/20xx</span>
                    </p>
                </div>
            </div>
            <?php endif; ?>
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

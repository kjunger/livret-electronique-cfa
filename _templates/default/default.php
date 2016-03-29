<?php   //Script préliminaire pour le bon déroulement de l'affichage
    /* Gestion de la déconnexion */
    if(isset($_GET['logout'])){         //si l'utilisateur a demandé à se connecter (via lien de déconnexion)
        unset($_SESSION['login']);      //Effacement des variables
        unset($_SESSION['situation']);  //de session (login et type d'utilisateur)
        session_destroy();              //Fermeture de la session
        header('Location:index.php');   //Retour à la page racine, qui affichera le formulaire de connexion
    }

    /* Initialisation de la connexion à la base de données */
    try{    //tentative de connexion à la base de données
        $db=new PDO('mysql:dbname=livretelectronique;host=127.0.0.1','root','');     //où resp. le nom de la BDD (ici, portfolio), l'adresse du serveur de BDD (ici, 127.0.0.1), l'utilisateur de la BDD (ici, root) et le mot de passe (ici, rien du tout) doivent être remplacés par les valeurs adéquates le cas échéant
    } catch(PDOException $e){   //si la tentative de connexion échoue
        echo 'Impossible de se connecter à la base de données : '.$e->getMessage();     //récupération et affichage du message d'erreur
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
                <?php   //Script gérant l'affichage du nom de l'utilisateur
                    switch($_SESSION['situation']){     //Détection du type d'utilisateur en cours
                        case "apprenti":    //Si apprenti
                            $name=$db->query("select prenomApprenti, nomApprenti from apprenti where loginApprenti='".$_SESSION['login']."';");
                            $answer=$name->fetchAll();
                            if(count($answer)==1){
                                echo '<span id="nom">'.$answer[0]['prenomApprenti'].' '.$answer[0]['nomApprenti'].'</span>';
                            }
                            break;
                        case "maitreapprentissage":     //Si maître d'apprentissage
                            $name=$db->query("select prenomMaitreApprentissage, nomMaitreApprentissage from maitreapprentissage where loginMaitreApprentissage='".$_SESSION['login']."';");
                            $answer=$name->fetchAll();
                            if(count($answer)==1){
                                echo '<span id="nom">'.$answer[0]['prenomMaitreApprentissage'].' '.$answer[0]['nomMaitreApprentissage'].'</span>';
                            }
                            break;
                        case "tuteurpedagogique":       //Si tuteur pédagogique
                            $name=$db->query("select prenomTuteurPedagogique, nomTuteurPedagogique from tuteurpedagogique where loginTuteurPedagogique='".$_SESSION['login']."';");
                            $answer=$name->fetchAll();
                            if(count($answer)==1){
                                echo '<span id="nom">'.$answer[0]['prenomTuteurPedagogique'].' '.$answer[0]['nomTuteurPedagogique'].'</span>';
                            }
                            break;
                    }
                ?>
            </p>
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
                        <?php   //Script de récupération des liens pour le menu Formulaires
                            try {
                                $formLinks = $db->query("select * from formulairestandard where catFormulaireStandard='form';");
                                $answer = $formLinks->fetchAll();
                            }

                            catch (PDOException $e) {
                                echo 'Erreur de transaction : ' . $e->getMessage();
                            }

                            foreach ($answer as $row) {
                                echo '<li><a href="index.php?cat=' . $row['catFormulaireStandard'] . '&amp;slug=' . $row['slugFormulaireStandard'] . '">' . $row['nomFormulaireStandard'] . '</a></li>';
                            }
                        ?>
                    </ul>
                </li>
                <li>
                    <a href="index.php?cat=contrat" id="<?php if (isset($_GET['cat']) && $_GET['cat']=='contrat') { echo 'actif'; } ?>"><img src="_templates/default/assets/icons/contrat.svg" alt="Contrat" class="icn" />Contrat</a>
                </li>
                <li>
                    <a href="index.php?cat=fichiers" id="<?php if (isset($_GET['cat']) && $_GET['cat']=='fichiers') { echo 'actif'; } ?>"><img src="_templates/default/assets/icons/fichiers.svg" alt="Fichiers" class="icn" />Fichiers</a>
                </li>
                <li>
                    <a href="index.php?cat=contacts" id="<?php if (isset($_GET['cat']) && $_GET['cat']=='contacts') { echo 'actif'; } ?>"><img src="_templates/default/assets/icons/contacts.svg" alt="Contacts" class="icn" />Contacts</a>
                </li>
            </ul>
        </nav>
        <main>
            <p id="breadcrumbs">
                <?php   //Script de récupération et d'affichage dynamique du fil d'Ariane
                    if (!empty($_GET['cat']) && !empty($_GET['id'])) {

                        switch ($_GET['cat']) {
                            case "form":
                                echo 'Formulaires > ';
                                break;
                        }

                        try {
                            $formName = $db->query("select nomFormulaireStandard from formulairestandard where slugFormulaireStandard='" . $_GET['slug'] . "';");
                            $answer = $formName->fetchAll();
                        }

                        catch (PDOException $e) {
                            echo 'Erreur de transaction : ' . $e->getMessage();
                        }

                        if (count($answer) == 1){
                            echo $answer[0]['nomFormulaireStandard'];
                        }

                    } else {
                        echo '<a href="index.php">Accueil</a> > ';
                    }
                ?>
            </p>
            <?php   //Controlleur pour l'affichage du contenu
                if (!empty($_GET['slug'])):
                    try {
                        $form = $db->query("select * from formulairestandard where slugFormulaireStandard='" . $_GET['slug'] . "';");
                        $answer = $form->fetchAll();
                    }

                    catch(PDOException $e) {
                        echo 'Erreur de transaction : ' . $e->getMessage();
                    }

                    if (count($answer) == 1) {
                        echo $answer[0]['contenuFormulaireStandard'];
                    }
                    else {
                        echo 'La page que vous cherchez à consulter n\'existe pas.';
                    }
                else:
            ?>
                <div class="conteneur">
                    <div class="titre">
                        <h1>Informations générales</h1>
                    </div>
                    <div class="contenu">
                        <?php if($_SESSION['situation']=='apprenti'): ?>
                            <h2>Formation actuelle</h2>
                            <p>
                                <?php
                                try {
                                    $idformation = $db->query("select idFormation from apprenti where loginApprenti='" . $_SESSION['login'] . "';");
                                    $answer=$idformation->fetchAll();
                                } catch (PDOException $e) {
                                    echo 'Erreur de transaction : ' . $e->getMessage();
                                }
                                if (count($answer) == 1) {
                                    try {
                                        $formation = $db->query('select nomFormation from formation where idFormation=' . $answer[0]['idFormation'] . ';');
                                        $answer = $formation->fetchAll();
                                    } catch (PDOException $e) {
                                        echo 'Erreur de transaction : ' . $e->getMessage();
                                    }
                                    if (count($answer) == 1) {
                                        echo $answer[0]['nomFormation'];
                                    }
                                }
                            ?>
                            </p>
                            <?php endif; ?>
                                <h2>Entreprise</h2>
                                <p>
                                    SARL ...
                                    <br/> 1 rue Truc - BP666 - 76123 Quelque-Part
                                </p>
                                <h2>Maître d'apprentissage</h2>
                                <p>
                                    M. XXXX Xxxxxx
                                    <br/> Directeur des ressources humaines
                                </p>
                                <h2>Tuteur pédagogique</h2>
                                <p>
                                    Mme YYYYY Yyyyy
                                    <br/> IUT de Rouen
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

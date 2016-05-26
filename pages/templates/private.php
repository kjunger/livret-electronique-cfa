<!DOCTYPE html>
<html lang="fr">
<head>
    <title>Livret Electronique de Suivi de l'Apprenti - Université de Rouen</title>
    <meta charset="utf-8" />
    <link type="text/css" rel="stylesheet" href="css/private.min.css" />
    <script type="text/javascript" src="https://code.jquery.com/jquery-1.12.3.min.js">
    </script>
    <script type="text/javascript" src="js/classie.js"></script>
    <script type="text/javascript" src="js/fancySelect.js"></script>
    <script type="text/javascript" src="js/script.js">
    </script>
    <script type="text/javascript">
      $(document).ready(function(){
        $('.basic').fancySelect();
      });
    </script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
</head>
<body>
    <nav id="cssmenu">
        <img src="img/logo.png" alt="Logo CFA-CFC" id="menu-logo" />
        <ul>
            <li>
                <a href="private.php">
                    <div class="accueil">Accueil</div>
                </a>
            </li>
            <li class="has-sub">
                <a href="#">
                    <div class="form">Formulaires</div>
                </a>
                <ul>
                </ul>
            </li>
            <li class="has-sub">
                <a href="#">
                    <div class="eval">Evaluations</div>
                </a>
                <ul>
                </ul>
            </li>
            <li>
                <a href="?p=private.contrat">
                    <div class="contrat">Contrat</div>
                </a>
            </li>
            <li>
                <a href="">
                    <div class="fichiers">Fichiers</div>
                </a>
            </li>
            <li>
                <a href="">
                    <div class="contacts">Contacts</div>
                </a>
            </li>
        </ul>
    </nav>
    <div id="deconnexion-mobile">
        <p><?= App::getInstance()->getTable('Utilisateur')->find($_SESSION['auth'])->getFullName(); ?></p>
        <div id="contenu-menu-user">
            <ul>
                <li>
                    <a href="?p=private.profile">
                        <img src="icons/user_blanc.svg" alt="" />Profil
                    </a>
                </li>
                <li>
                    <a href="?p=private.logout">
                        <img src="icons/deconnexion_blanc.svg" alt="" />Deconnexion
                    </a>
                </li>
            </ul>
            <img src="img/logo_univ_rouen.png" alt="Logo Université de Rouen" id="logo_univ_blanc" />
            <img src="img/logo_iut_rouen.png" alt="Logo Composante" id="logo_etab_blanc" />
        </div>
        <div class="footer-menu">
            <div id="content-footer-menu">
                <ul>
                    <li>
                        <a href="">Contact</a>
                    </li>
                    <li>
                        <a href="">Mentions légales</a>
                    </li>
                </ul>
                <ul class="img-footer-menu">
                    <li>
                        <img src="img/logo_region.png" alt="Logo Région Normandie" class="logo_region_menu" />
                    </li>
                    <li class="separateur">-
                    </li>
                    <li>
                        <img src="img/logo_ministere.png" alt="Logo Ministère de l'Enseignement Supérieur et de la Recherche" class="logo_ministere_menu" />
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <div class="screen">
        <header class="header">
            <div class="bouton">
                <div class="x">
                </div>
                <div class="y">
                </div>
                <div class="z">
                </div>
            </div>
            <img src="img/logo.png" alt="Logo CFA-CFC" id="header-logo" />
            <p>
                Bienvenue,
                <br/>
                <span id="nom"><?= App::getInstance()->getTable('Utilisateur')->find($_SESSION['auth'])->getFullName(); ?></span>
            </p>
            <div id="user">
                <img src="icons/user.svg" alt="" />
            </div>
            <button id="bouton-deconnexion">
            </button>
            <button id="bouton-menu-user">
            </button>
            <div id="deconnexion" class="">
                <ul class="hidden">
                    <li>
                        <a href="?p=private.profile">
                            <img src="icons/user.svg" alt="" />Profil
                        </a>
                    </li>
                    <li class="separateur">-
                    </li>
                    <li>
                        <a href="?p=private.logout">
                            <img src="icons/deconnexion.svg" alt="" />Deconnexion
                        </a>
                    </li>
                </ul>
            </div>
        </header>
        <div id="main">
            <p id="breadcrumbs">
                <?= $content; ?>
            </p>
        </div>
        <footer>
            <img src="img/logo_univ_rouen.png" alt="Logo Université de Rouen" id="logo_univ" />
            <img src="img/logo_iut_rouen.png" alt="Logo Composante" id="logo_etab" />
            <ul>
                <li>
                    <a href="#">Contact</a>
                </li>
                <li>
                    <a href="#">Mentions légales</a>
                </li>
            </ul>
            <img src="img/logo_region.png" alt="Logo Région Normandie" id="logo_region" />
            <img src="img/logo_ministere.png" alt="Logo Ministère de l'Enseignement Supérieur et de la Recherche" id="logo_ministere" />
        </footer>
    </div>
</body>

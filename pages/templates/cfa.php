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
        $(document).ready(function () {
            $('.basic').fancySelect();
        });
    </script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
</head>

<body>
   <div id="deconnexion-mobile">
        <p>
            <?= $user->getFullName(); ?>
        </p>
        <div id="contenu-menu-user">
            <ul>
                <li>
                    <a href="?p=cfa.logout">
                        <img src="icons/deconnexion_blanc.svg" alt="" />Deconnexion
                    </a>
                </li>
            </ul>
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
                <span id="nom"><?= $user->getFullName(); ?></span>
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
                        <a href="?p=cfa.logout">
                            <img src="icons/deconnexion.svg" alt="" />Deconnexion
                        </a>
                    </li>
                </ul>
            </div>
        </header>
        <div id="main">
            <?= $content; ?>
        </div>
    </div>
</body>

</html>

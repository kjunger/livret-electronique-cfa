<div id="main">
    <p id="breadcrumbs">
        <?php
            /*echo '<a href="index.php">Accueil</a> > ';
            if (isset($_GET['cat']) && isset($_GET['slug']))
            {
                displayBreadcrumbs($db, $_GET['cat'], $_GET['slug']);
            }*/
        ?>
    </p>
    <?php
        /*if (isset($_GET['cat']) && isset($_GET['slug']))
        {
            include('_views/default/' . $_GET['cat'] . '/' . $_GET['slug'] . '.php');
        }
        else
        {
            include ('_templates/default/includes/home.php');
        }*/
    ?>
    <div id="content">
        <div class="conteneur">
            <div class="titre">
                <h1>Informations générales
          </h1>
            </div>
            <div class="contenu">
                <?php 
                switch($_SESSION['type']) {
                    case "apprenti":
                        echo <<<STR
    <h2>Formation actuelle</h2>
    <p>
STR;
                        echo $userInfo['formation']['intitule'];
                        echo <<<STR
    </p>
    <h2>Entreprise</h2>
    <p>
STR;
                        echo $userInfo['entreprise']['raisonsociale'] . '<br />' . $userInfo['entreprise']['adresse'] . '<br />' . $userInfo['entreprise']['cp'] . ' ' . $userInfo['entreprise']['ville'];
                        echo <<<STR
    </p>
    <h2>Maître d'apprentissage</h2>
    <p>
STR;
                        echo $userInfo['maitreapprentissage']['prenom'] . ' ' . $userInfo['maitreapprentissage']['nom'] . '<br />' . $userInfo['maitreapprentissage']['fonction'];
                        echo <<<STR
    </p>
    <h2>Tuteur pédagogique</h2>
    <p>
STR;
                        echo $userInfo['tuteurpedagogique']['prenom'] . ' ' . $userInfo['tuteurpedagogique']['nom'] . '</p>';
                }
                ?>
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
                    <br/> " Retour d'expérience "
                    <br/>
                    <span class="info">Date limite : 05/09/20xx</span>
                </p>
                <h2>Formulaire à remplir</h2>
                <p>
                    Vous devez compléter le formulaire suivant :
                    <br/> " Insertion professionnelle et suivi des diplômés "
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
    </div>
</div>

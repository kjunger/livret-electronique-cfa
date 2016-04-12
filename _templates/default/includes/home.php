<div id="content">
    <div class="conteneur">
        <div class="titre">
            <h1>Informations générales
      </h1>
        </div>
        <div class="contenu">
            <?php userDisplayGeneralInfos($_SESSION['user']); ?>
        </div>
    </div>
    <div class="conteneur">
        <div class="titre">
            <h1>Important</h1>
        </div>
        <div class="contenu">
            <!-- <?php /*userDisplayImportantInfos($_SESSION['user'], $db);*/ ?> -->
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

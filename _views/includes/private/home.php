<div id="content">
    <div class="conteneur">
        <div class="titre">
            <h1>Informations générales</h1>
        </div>
        <?php
        switch ($_SESSION['type']) {
        case "apprenti":
            $doc = phpQuery::newDocument("<div/>");
            $doc["div"]->attr("class", "contenu");
            $doc[".contenu"]->append("<h2>Formation actuelle</h2>");
            $formation = phpQuery::newDocument("<p/>");
            $formation["p"]->append($userInfo['formation']['intitule']);
            $doc[".contenu"]->append($formation);
            $doc[".contenu"]->append("<h2>Entreprise</h2>");
            $entreprise = phpQuery::newDocument("<p/>");
            $entreprise["p"]->append($userInfo['entreprise']['raisonsociale'] . "<br /><span></span>");
            $entreprise["span"]->attr("class", "info");
            $entreprise[".info"]->append($userInfo['entreprise']['adresse'] . '<br />' . $userInfo['entreprise']['cp'] . ' ' . $userInfo['entreprise']['ville']);
            $doc[".contenu"]->append($entreprise);
            $doc[".contenu"]->append("<h2>Maître d'apprentissage</h2>");
            $maitreApprentissage = phpQuery::newDocument("<p/>");
            $maitreApprentissage["p"]->append($userInfo['maitreapprentissage']['prenom'] . ' ' . $userInfo['maitreapprentissage']['nom'] . "<br /><span></span>");
            $maitreApprentissage["span"]->attr("class", "info");
            $maitreApprentissage[".info"]->append($userInfo['maitreapprentissage']['fonction']);
            $doc[".contenu"]->append($maitreApprentissage);
            $doc[".contenu"]->append("<h2>Tuteur pédagogique</h2>");
            $tuteurPedagogique = phpQuery::newDocument("<p/>");
            $tuteurPedagogique["p"]->append($userInfo['tuteurpedagogique']['prenom'] . ' ' . $userInfo['tuteurpedagogique']['nom']);
            $doc[".contenu"]->append($tuteurPedagogique);
            print $doc;
            break;
        case "maitreapprentissage":
            $doc = phpQuery::newDocument("<div/>");
            $doc["div"]->attr("class", "contenu");
            $doc[".contenu"]->append("<h2>Votre entreprise</h2>");
            $entreprise = phpQuery::newDocument("<p/>");
            $entreprise["p"]->append($userInfo['entreprise']['raisonsociale'] . "<br /><span></span>");
            $entreprise["span"]->attr("class", "info");
            $entreprise[".info"]->append($userInfo['entreprise']['adresse'] . '<br />' . $userInfo['entreprise']['cp'] . ' ' . $userInfo['entreprise']['ville']);
            $doc[".contenu"]->append($entreprise);
            $doc[".contenu"]->append("<h2>Votre apprenti</h2>");
            $apprenti = phpQuery::newDocument("<p/>");
            $apprenti["p"]->append($userInfo['apprenti']['prenom'] . ' ' . $userInfo['apprenti']['nom'] . "<br /><span></span>");
            $apprenti["span"]->attr("class", "info");
            $apprenti[".info"]->append($userInfo['apprenti']['formation'] . '<br />' . $userInfo['apprenti']['composante']);
            $doc[".contenu"]->append($apprenti);
            $doc[".contenu"]->append("<h2>Tuteur pédagogique</h2>");
            $tuteurPedagogique = phpQuery::newDocument("<p/>");
            $tuteurPedagogique["p"]->append($userInfo['tuteurpedagogique']['prenom'] . ' ' . $userInfo['tuteurpedagogique']['nom']);
            $doc[".contenu"]->append($tuteurPedagogique);
            print $doc;
            break;
        case "tuteurpedagogique":
            $doc = phpQuery::newDocument("<div/>");
            $doc["div"]->attr("class", "contenu");
            $doc[".contenu"]->append("<h2>Formation de rattachement</h2>");
            $formation = phpQuery::newDocument("<p/>");
            $formation["p"]->append($userInfo['formation']['intitule']);
            $doc[".contenu"]->append($formation);
            $doc[".contenu"]->append("<h2>L'apprenti suivi</h2>");
            $apprenti = phpQuery::newDocument("<p/>");
            $apprenti["p"]->append($userInfo['apprenti']['prenom'] . ' ' . $userInfo['apprenti']['nom']);
            $doc[".contenu"]->append($apprenti);
            $doc[".contenu"]->append("<h2>Maître d'apprentissage</h2>");
            $maitreApprentissage = phpQuery::newDocument("<p/>");
            $maitreApprentissage["p"]->append($userInfo['maitreapprentissage']['prenom'] . ' ' . $userInfo['maitreapprentissage']['nom'] . '<br /><span></span>');
            $maitreApprentissage["span"]->attr("class", "info");
            $maitreApprentissage[".info"]->append($userInfo['maitreapprentissage']['fonction']);
            $doc[".contenu"]->append($maitreApprentissage);
            $doc[".contenu"]->append("<h2>Entreprise</h2>");
            $entreprise = phpQuery::newDocument("<p/>");
            $entreprise["p"]->append($userInfo['entreprise']['raisonsociale'] . '<br /><span></span>');
            $entreprise["span"]->attr("class", "info");
            $entreprise[".info"]->append($userInfo['entreprise']['adresse'] . '<br />' . $userInfo['entreprise']['cp'] . ' ' . $userInfo['entreprise']['ville']);
            $doc[".contenu"]->append($entreprise);
            print $doc;
            break;
        }
        ?>
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

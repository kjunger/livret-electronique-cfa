<?php
$user = App::getInstance()->getTable('Utilisateur')->find($_SESSION['auth']);
$infos_apprenti = App::getInstance()->getTable('InfosApprenti')->find($_SESSION['auth'], 'Apprenti');
?>
<div class="content">
    <h1>Fiche de renseignements</h1>
    <form action="" method="post">
        <div class="conteneur large">
            <div class="titre">
                <h1>Apprenti</h1>
            </div>
            <div class="contenu">
                <input placeholder="Nom" name="nomApprenti" type="text" value="<?= $user->nom; ?>" />
                <input placeholder="Prénom" name="prenomApprenti" type="text" value="<?= $user->prenom; ?>" />
                <input placeholder="Date de naissance (jj/mm/aaaa)" name="dateNaissanceApprenti" type="text" pattern="(^(((0[1-9]|1[0-9]|2[0-8])[\/](0[1-9]|1[012]))|((29|30|31)[\/](0[13578]|1[02]))|((29|30)[\/](0[4,6,9]|11)))[\/](19|[2-9][0-9])\d\d$)|(^29[\/]02[\/](19|[2-9][0-9])(00|04|08|12|16|20|24|28|32|36|40|44|48|52|56|60|64|68|72|76|80|84|88|92|96)$)" value="<?= str_replace("-", "/", $infos_apprenti->dateNaissance); ?>" />
                <input placeholder="Ville de naissance" name="villeNaissanceApprenti" type="text" value="<?= $infos_apprenti->villeNaissance; ?>" />
                <input placeholder="Adresse" name="adresseApprenti" type="text" value="<?= $infos_apprenti->adApprenti; ?>" />
                <input placeholder="Code postal" name="cpApprenti" type="text" pattern="[0-9]{5}" value="<?= $infos_apprenti->cpApprenti; ?>" />
                <input placeholder="Ville" name="villeApprenti" type="text" value="<?= $infos_apprenti->villeApprenti; ?>" />
                <input placeholder="Email" name="mailApprenti" type="email" value="<?= $user->email; ?>" />
                <input placeholder="Téléphone" name="telApprenti" type="tel" pattern="0[0-9]{9}" value="<?= $user->tel; ?>" />
                <input placeholder="Portable" name="portApprenti" type="tel" pattern="0[0-9]{9}" value="<?= $user->port; ?>" />
            </div>
        </div>
        <div class="conteneur large">
            <div class="titre">
                <h1>Entreprise</h1>
            </div>
            <div class="contenu">
                <input placeholder="Raison sociale" name="raisonSociale" type="text" />
                <h2>Siège social</h2>
                <input placeholder="Adresse du siège social" name="adresseSiegeSocial" type="text" />
                <input placeholder="Code postal" name="cpSiegeSocial" type="text" pattern="[0-9]{5}" />
                <input placeholder="Ville" name="villeSiegeSocial" type="text" />
                <h2>Site d'accueil de l'apprenti(e) <span class="info">(si différent du siège social)</span></h2>
                <input placeholder="Adresse du site d'accueil" name="adresseSiteAccueil" type="text" />
                <input placeholder="Code postal" name="cpSiteAccueil" type="text" pattern="[0-9]{5}" />
                <input placeholder="Ville" name="villeSiteAccueil" type="text" />
                <h2>Maître d'apprentissage</h2>
                <input placeholder="Nom" type="text" />
                <input placeholder="Prénom" type="text" />
                <input placeholder="Fonction" type="text" />
                <input placeholder="Email" type="email" />
                <input placeholder="Téléphone" type="tel" pattern="0[0-9]{9}" />
                <input placeholder="Portable" type="tel" pattern="0[6-7]{1}[0-9]{8}" />
            </div>
        </div>
        <div class="conteneur large">
            <div class="titre">
                <h1>Tuteur pédagogique</h1>
            </div>
            <div class="contenu">
                <input placeholder="Nom" type="text" />
                <input placeholder="Prénom" type="text" />
                <input placeholder="Email" type="email" />
                <input placeholder="Téléphone" type="tel" pattern="0[0-9]{9}" />
                <input placeholder="Portable" type="tel" pattern="0[6-7]{1}[0-9]{8}" />
            </div>
        </div>
        <input class="submit-field" type="submit" value="Valider" />
    </form>
</div>

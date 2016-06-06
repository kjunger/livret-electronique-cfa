<?php
if($user->type === 'apprenti') {
    $infos_apprenti = App::getInstance()->getTable('Utilisateur')->infosApprenti($_SESSION['auth']);
    $maitreApp = App::getInstance()->getTable('Utilisateur')->whoIs($contrat->idMaitreApprentissage, "maitreApprentissage", $_SESSION['auth'], $user->type);
    $entreprise = App::getInstance()->getTable('Utilisateur')->entreprise($maitreApp->idUtilisateur);
    $tuteur = App::getInstance()->getTable('Utilisateur')->whoIs($contrat->idTuteurPedagogique, "tuteurPedagogique", $_SESSION['auth'], $user->type);
}
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
                <input placeholder="Date de naissance (jj/mm/aaaa)" name="dateNaissanceApprenti" type="text" pattern="(^(((0[1-9]|1[0-9]|2[0-8])[\/](0[1-9]|1[012]))|((29|30|31)[\/](0[13578]|1[02]))|((29|30)[\/](0[4,6,9]|11)))[\/](19|[2-9][0-9])\d\d$)|(^29[\/]02[\/](19|[2-9][0-9])(00|04|08|12|16|20|24|28|32|36|40|44|48|52|56|60|64|68|72|76|80|84|88|92|96)$)" value="<?= $infos_apprenti->getDate("naissance"); ?>" />
                <input placeholder="Ville de naissance" name="villeNaissanceApprenti" type="text" value="<?= $infos_apprenti->villeNaissance; ?>" />
                <input placeholder="Âge" name="ageApprenti" type="text" value="<?= $infos_apprenti->age; ?>" />
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
                <input placeholder="Raison sociale" name="raisonSociale" type="text" value="<?= $entreprise->raisonSocialeEntreprise; ?>" />
                <h2>Siège social</h2>
                <input placeholder="Adresse du siège social" name="adresseSiegeSocial" type="text" value="<?= $entreprise->adEntreprise; ?>" />
                <input placeholder="Code postal" name="cpSiegeSocial" type="text" pattern="[0-9]{5}" value="<?= $entreprise->cpEntreprise; ?>" />
                <input placeholder="Ville" name="villeSiegeSocial" type="text" value="<?= $entreprise->villeEntreprise; ?>" />
                <h2>Maître d'apprentissage</h2>
                <input placeholder="Nom" type="text" value="<?= $maitreApp->nom; ?>" />
                <input placeholder="Prénom" type="text" value="<?= $maitreApp->prenom; ?>" />
                <input placeholder="Fonction" type="text" value="<?= $entreprise->fonction; ?>" />
                <input placeholder="Email" type="email" value="<?= $maitreApp->email; ?>" />
                <input placeholder="Téléphone" type="tel" pattern="0[0-9]{9}" value="<?= $maitreApp->tel; ?>" />
                <input placeholder="Portable" type="tel" pattern="0[6-7]{1}[0-9]{8}" value="<?= $maitreApp->port; ?>" />
            </div>
        </div>
        <div class="conteneur large">
            <div class="titre">
                <h1>Tuteur pédagogique</h1>
            </div>
            <div class="contenu">
                <input placeholder="Nom" type="text" value="<?= $tuteur->nom; ?>" />
                <input placeholder="Prénom" type="text" value="<?= $tuteur->prenom; ?>" />
                <input placeholder="Email" type="email" value="<?= $tuteur->email; ?>" />
                <input placeholder="Téléphone" type="tel" pattern="0[0-9]{9}" value="<?= $tuteur->tel; ?>" />
                <input placeholder="Portable" type="tel" pattern="0[6-7]{1}[0-9]{8}" value="<?= $tuteur->port; ?>" />
            </div>
        </div>
        <input class="submit-field" type="submit" value="Valider" />
    </form>
</div>

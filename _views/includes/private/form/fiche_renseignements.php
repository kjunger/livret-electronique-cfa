<h1>Fiche de renseignements</h1>
<form action="<?php echo VIEW_DIR; ?>/includes/private/form/fiche_renseignements_pdf.php" method="post">
    <div class="conteneur large">
        <div class="titre">
            <h1>Apprenti</h1>
        </div>
        <div class="contenu">
            <input placeholder="Nom" name="nomApprenti" type="text" value="<?php echo $userInfo['user']['nom']; ?>" required />
            <input placeholder="Prénom" name="prenomApprenti" type="text" value="<?php echo $userInfo['user']['prenom']; ?>" required />
            <input placeholder="Date de naissance (jj/mm/aaaa)" name="dateNaissanceApprenti" type="text" pattern="(^(((0[1-9]|1[0-9]|2[0-8])[\/](0[1-9]|1[012]))|((29|30|31)[\/](0[13578]|1[02]))|((29|30)[\/](0[4,6,9]|11)))[\/](19|[2-9][0-9])\d\d$)|(^29[\/]02[\/](19|[2-9][0-9])(00|04|08|12|16|20|24|28|32|36|40|44|48|52|56|60|64|68|72|76|80|84|88|92|96)$)" required />
            <input placeholder="Lieu de naissance" name="lieuNaissanceApprenti" type="text" required />
            <input placeholder="Adresse" name="adresseApprenti" type="text" value="<?php echo $userInfo['user']['adresse']; ?>" required />
            <input placeholder="Code postal" name="cpApprenti" type="text" pattern="[0-9]{5}" value="<?php echo $userInfo['user']['cp']; ?>" required />
            <input placeholder="Ville" name="villeApprenti" type="text" value="<?php echo $userInfo['user']['ville']; ?>" required />
            <input placeholder="Email" name="mailApprenti" type="email" value="<?php echo $userInfo['user']['email']; ?>" required />
            <input placeholder="Téléphone" name="telApprenti" type="tel" pattern="0[0-9]{9}" value="<?php echo $userInfo['user']['tel']; ?>" required />
            <input placeholder="Portable" name="portApprenti" type="tel" pattern="0[6-7]{1}[0-9]{8}" value="<?php echo $userInfo['user']['port']; ?>" required />
        </div>
    </div>
    <div class="conteneur large">
        <div class="titre">
            <h1>Entreprise</h1>
        </div>
        <div class="contenu">
            <input placeholder="Raison sociale" type="text" />
            <h2>Siège social</h2>
            <input placeholder="Adresse du siège social" type="text" />
            <input placeholder="Code postal" type="text" pattern="[0-9]{5}" />
            <input placeholder="Ville" type="text" />
            <h2>Site d'accueil de l'apprenti(e) <span class="info">(si différent du siège social)</span></h2>
            <input placeholder="Adresse du site d'accueil" type="text" />
            <input placeholder="Code postal" type="text" pattern="[0-9]{5}" />
            <input placeholder="Ville" type="text" />
            <h2>Maître d'apprentissage</h2>
            <input placeholder="Nom" type="text" />
            <input placeholder="Prénom" type="text" />
            <input placeholder="Fonction" type="text" />
            <input placeholder="Email" type="email" />
            <input placeholder="Téléphone" type="tel" pattern="0[0-9]{9}" />
            <input placeholder="Portable" type="tel" pattern="0[6-7]{1}[0-9]{8}" />
        </div>
    </div>
    <input class="submit-field" type="submit" value="Valider" />
</form>
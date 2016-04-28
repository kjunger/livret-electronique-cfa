<h1>Fiche de renseignements</h1>
<form action="<?php echo VIEW_DIR; ?>/includes/private/form/fiche_renseignements_pdf.php" method="post">
    <div class="conteneur_large">
        <div class="titre">
            <h1>Apprenti</h1>
        </div>
        <div class="contenu">
            <p>
                <input placeholder="Nom" name="nomApprenti" type="text" value="<?php echo $userInfo['user']['nom']; ?>" required />
            </p>
            <p>
                <input placeholder="Prénom" name="prenomApprenti" type="text" value="<?php echo $userInfo['user']['prenom']; ?>" required />
            </p>
            <p>
                <input placeholder="Date de naissance (jj/mm/aaaa)" name="dateNaissanceApprenti" type="text" pattern="(^(((0[1-9]|1[0-9]|2[0-8])[\/](0[1-9]|1[012]))|((29|30|31)[\/](0[13578]|1[02]))|((29|30)[\/](0[4,6,9]|11)))[\/](19|[2-9][0-9])\d\d$)|(^29[\/]02[\/](19|[2-9][0-9])(00|04|08|12|16|20|24|28|32|36|40|44|48|52|56|60|64|68|72|76|80|84|88|92|96)$)" required />
            </p>
            <p>
                <input placeholder="Lieu de naissance" name="lieuNaissanceApprenti" type="text" required />
            </p>
            <p>
                <input placeholder="Adresse" name="adresseApprenti" type="text" value="<?php echo $userInfo['user']['adresse']; ?>" required />
            </p>
            <p>
                <input placeholder="Code postal" name="cpApprenti" type="text" pattern="[0-9]{5}" value="<?php echo $userInfo['user']['cp']; ?>" required />
            </p>
            <p>
                <input placeholder="Ville" name="villeApprenti" type="text" value="<?php echo $userInfo['user']['ville']; ?>" required />
            </p>
            <p>
                <input placeholder="Email" name="mailApprenti" type="email" value="<?php echo $userInfo['user']['email']; ?>" required />
            </p>
            <p>
                <input placeholder="Téléphone" name="telApprenti" type="tel" pattern="0[0-9]{9}" value="<?php echo $userInfo['user']['tel']; ?>" required />
            </p>
            <p>
                <input placeholder="Portable" name="portApprenti" type="tel" pattern="0[6-7]{1}[0-9]{8}" value="<?php echo $userInfo['user']['port']; ?>" required />
            </p>
        </div>
    </div>
    <div class="conteneur_large">
        <div class="titre">
            <h1>Entreprise</h1>
        </div>
        <div class="contenu">
            <p>
                <input placeholder="Raison sociale" id="raisonSocialeEnt" type="text" />
            </p>
            <h2>Siège social</h2>
            <p>
                <input placeholder="Adresse du siège social" id="adSiege" type="text" />
            </p>
            <p>
                <input placeholder="Code postal" id="cpSiege" type="text" pattern="[0-9]{5}" />
            </p>
            <p>
                <input placeholder="Ville" id="villeSiege" type="text" />
            </p>
            <h2>Site d'accueil de l'apprenti(e) <span class="info">(si différent du siège social)</span></h2>
            <p>
                <input placeholder="Adresse du site d'accueil" id="adAccueil" type="text" />
            </p>
            <p>
                <input placeholder="Code postal" id="cpSiege" type="text" pattern="[0-9]{5}" />
            </p>
            <p>
                <input placeholder="Ville" id="villeSiege" type="text" />
            </p>
            <h2>Maître d'apprentissage</h2>
            <p>
                <input placeholder="Nom" id="nomMaitreApp" type="text" />
            </p>
            <p>
                <input placeholder="Prénom" id="prenomMaitreApp" type="text" />
            </p>
            <p>
                <input placeholder="Fonction" id="fonctionMaitreApp" type="text" />
            </p>
            <p>
                <input placeholder="Email" id="mailMaitreApp" type="email" />
            </p>
            <p>
                <input placeholder="Téléphone" id="telMaitreApp" type="tel" pattern="0[0-9]{9}" />
            </p>
            <p>
                <input placeholder="Portable" id="portMaitreApp" type="tel" pattern="0[6-7]{1}[0-9]{8}" />
            </p>
        </div>
    </div>
    <p class="btn">
        <input type="submit" value="Valider" />
    </p>
</form>
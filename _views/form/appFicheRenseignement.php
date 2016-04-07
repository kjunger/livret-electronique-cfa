<h1>Fiche de renseignements</h1>
<form action="" method="">
    <div id="content">
        <div class="conteneur_large">
            <div class="titre">
                <h1>Apprenti</h1>
            </div>
            <div class="contenu">
                <p>
                    <input placeholder="Nom" id="nomApprenti" type="text" required />
                </p>
                <p>
                    <input placeholder="Prénom" id="prenomApprenti" type="text" required />
                </p>
                <p>
                    <input placeholder="Date de naissance (XX/XX/XXXX)" id="dateNaissanceApprenti" type="text" pattern="(^(((0[1-9]|1[0-9]|2[0-8])[\/](0[1-9]|1[012]))|((29|30|31)[\/](0[13578]|1[02]))|((29|30)[\/](0[4,6,9]|11)))[\/](19|[2-9][0-9])\d\d$)|(^29[\/]02[\/](19|[2-9][0-9])(00|04|08|12|16|20|24|28|32|36|40|44|48|52|56|60|64|68|72|76|80|84|88|92|96)$)" required />
                </p>
                <p>
                    <input placeholder="Lieu de naissance" id="lieuNaissanceApprenti" type="text" required />
                </p>
                <p>
                    <input placeholder="Adresse" id="adresseApprenti" type="text" required />
                </p>
                <p>
                    <input placeholder="Complément d'adresse" id="complementAdApprenti" type="text" />
                </p>
                <p>
                    <input placeholder="Code postal" id="cpApprenti" type="text" pattern="[0-9]{5}" required />
                </p>
                <p>
                    <input placeholder="Ville" id="villeApprenti" type="text" required />
                </p>
                <p>
                    <input placeholder="Email" id="mailApprenti" type="email" required />
                </p>
                <p>
                    <input placeholder="Téléphone" id="telApprenti" type="tel" pattern="0[0-9]{9}" required />
                </p>
                <p>
                    <input placeholder="Portable" id="portApprenti" type="tel" pattern="0[6-7]{1}[0-9]{8}" required />
                </p>
            </div>
        </div>
        <div class="conteneur_large">
            <div class="titre">
                <h1>Entreprise</h1>
            </div>
            <div class="contenu">
                <p>
                    <input placeholder="Raison sociale" id="raisonSocialeEnt" type="text" required />
                </p>
                <h2>Siège social</h2>
                <p>
                    <input placeholder="Adresse du siège social" id="adSiege" type="text" required />
                </p>
                <p>
                    <input placeholder="Complément d'adresse" id="complementAdSiege" type="text" required />
                </p>
                <p>
                    <input placeholder="Code postal" id="cpSiege" type="text" pattern="[0-9]{5}" required />
                </p>
                <p>
                    <input placeholder="Ville" id="villeSiege" type="text" required />
                </p>
                <h2>Site d'accueil de l'apprenti(e) <span class="info">(si différent du siège social)</span></h2>
                <p>
                    <input placeholder="Adresse du site d'accueil" id="adAccueil" type="text" />
                </p>
                <p>
                    <input placeholder="Complément d'adresse" id="complementAdSiege" type="text" />
                </p>
                <p>
                    <input placeholder="Code postal" id="cpSiege" type="text" pattern="[0-9]{5}" />
                </p>
                <p>
                    <input placeholder="Ville" id="villeSiege" type="text" />
                </p>
                <h2>Maître d'apprentissage</h2>
                <p>
                    <input placeholder="Nom" id="nomMaitreApp" type="text" required />
                </p>
                <p>
                    <input placeholder="Prénom" id="prenomMaitreApp" type="text" required />
                </p>
                <p>
                    <input placeholder="Fonction" id="fonctionMaitreApp" type="text" required />
                </p>
                <p>
                    <input placeholder="Email" id="mailMaitreApp" type="email" required />
                </p>
                <p>
                    <input placeholder="Téléphone" id="telMaitreApp" type="tel" pattern="0[0-9]{9}" required />
                </p>
                <p>
                    <input placeholder="Portable" id="portMaitreApp" type="tel" pattern="0[6-7]{1}[0-9]{8}" />
                </p>
            </div>
        </div>
    </div>
    <p class="btn">
        <input type="submit" value="Valider" />
    </p>
</form>

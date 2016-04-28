<h1>Dépôt d'offre d'alternance</h1>
<form action="" method="">
    <div class="conteneur_large">
        <div class="titre">
            <h1>Entreprise</h1>
        </div>
        <div class="contenu">
            <p>
                <input placeholder="Raison sociale" id="raisonSocialeEnt" type="text" required />
            </p>
            <p>
                <input placeholder="Adresse du siège social" id="adSiege" type="text" required />
            </p>
            <p>
                <input placeholder="Code postal" id="cpSiege" type="text" pattern="[0-9]{5}" required />
            </p>
            <p>
                <input placeholder="Ville" id="villeSiege" type="text" required />
            </p>
            <p>
                <input placeholder="Site Internet" id="siteInternet" type="text" required />
            </p>
        </div>
    </div>
    <div class="conteneur_large">
        <div class="titre">
            <h1>Contact</h1>
        </div>
        <div class="contenu">
            <p>
                <input placeholder="Nom" id="nomApprenti" type="text" value="<?php echo $userInfo['user']['nom']; ?>" required />
            </p>
            <p>
                <input placeholder="Prénom" id="prenomApprenti" type="text" value="<?php echo $userInfo['user']['prenom']; ?>" required />
            </p>
            <p>
                <input placeholder="Email" id="mailApprenti" type="email" value="<?php echo $userInfo['user']['email']; ?>" required />
            </p>
            <p>
                <input placeholder="Téléphone" id="telApprenti" type="tel" pattern="0[0-9]{9}" value="<?php echo $userInfo['user']['tel']; ?>" required />
            </p>
            <p>
                <input placeholder="Portable" id="portApprenti" type="tel" pattern="0[6-7]{1}[0-9]{8}" value="<?php echo $userInfo['user']['port']; ?>" required />
            </p>
        </div>
    </div>
    <div class="conteneur_large">
        
    </div>
</form>
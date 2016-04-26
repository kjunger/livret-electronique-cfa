<h1>Votre profil</h1>
<form action="" method="">
    <div class="conteneur_large">
        <div class="contenu">
            <p>
                <input placeholder="Nom" id="nomApprenti" type="text" value="<?php echo $userInfo['user']['nom']; ?>" required />
            </p>
            <p>
                <input placeholder="Prénom" id="prenomApprenti" type="text" value="<?php echo $userInfo['user']['prenom']; ?>" required />
            </p>
            <p>
                <input placeholder="Adresse" id="adresseApprenti" type="text" value="<?php echo $userInfo['user']['adresse']; ?>" required />
            </p>
            <p>
                <input placeholder="Code postal" id="cpApprenti" type="text" pattern="[0-9]{5}" value="<?php echo $userInfo['user']['cp']; ?>" required />
            </p>
            <p>
                <input placeholder="Ville" id="villeApprenti" type="text" value="<?php echo $userInfo['user']['ville']; ?>" required />
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
</form>
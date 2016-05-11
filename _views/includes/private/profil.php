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
<?php
if ( $_SESSION[ 'type' ] == "apprenti" ) {
    echo <<<STR
                    <p>
                        <input placeholder="Adresse" id="adresseApprenti" type="text" value="
STR;
    echo $userInfo[ 'user' ][ 'adresse' ];
    echo <<<STR
                    " required />
                    </p>
                    <p>
                        <input placeholder="Code postal" id="cpApprenti" type="text" pattern="[0-9]{5}" value="
STR;
    echo $userInfo[ 'user' ][ 'cp' ];
    echo <<<STR
                    " required />
                    </p>
                    <p>
                        <input placeholder="Ville" id="villeApprenti" type="text" value="
STR;
    echo $userInfo[ 'user' ][ 'ville' ];
    echo <<<STR
                    " required />
                    </p>
STR;
} //$_SESSION[ 'type' ] == "apprenti"
if ( $_SESSION[ 'type' ] == "maitreapprentissage" ) {
    echo <<<STR
                    <p>
                        <input placeholder="Raison sociale" id="raisonSocialeEnt" type="text" value="
STR;
    echo $userInfo[ 'entreprise' ][ 'raisonsociale' ];
    echo <<<STR
                    " required />
                    </p>
                    <p>
                        <input placeholder="Adresse du siège social" id="adSiege" type="text" value="
STR;
    echo $userInfo[ 'entreprise' ][ 'adresse' ];
    echo <<<STR
                    " required />
                    </p>
                    <p>
                        <input placeholder="Code postal" id="cpSiege" type="text" pattern="[0-9]{5}" value="
STR;
    echo $userInfo[ 'entreprise' ][ 'cp' ];
    echo <<<STR
                    " required />
                    </p>
                    <p>
                        <input placeholder="Ville" id="villeSiege" type="text" value="
STR;
    echo $userInfo[ 'entreprise' ][ 'ville' ];
    echo <<<STR
                    " required />
                    </p>
STR;
} //$_SESSION[ 'type' ] == "maitreapprentissage"
?>
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

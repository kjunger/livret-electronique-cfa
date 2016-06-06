<div class="content">
    <h1>Votre profil</h1>
    <form action="" method="">
        <div class="conteneur_large">
            <div class="contenu">
                <p>
                    <input placeholder="Nom" id="nomApprenti" type="text" value="<?= $user->nom; ?>" required />
                </p>
                <p>
                    <input placeholder="Prénom" id="prenomApprenti" type="text" value="<?= $user->prenom; ?>" required />
                </p>
                <p>
                    <input placeholder="Email" id="mailApprenti" type="email" value="<?= $user->email; ?>" required />
                </p>
                <p>
                    <input placeholder="Téléphone" id="telApprenti" type="tel" pattern="0[0-9]{9}" value="<?= $user->tel; ?>" required />
                </p>
                <p>
                    <input placeholder="Portable" id="portApprenti" type="tel" pattern="0[6-7]{1}[0-9]{8}" value="<?= $user->port; ?>" required />
                </p>
            </div>
        </div>
    </form>
</div>

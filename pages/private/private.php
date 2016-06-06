<?php
    if($user->type !== 'maitreApprentissage') {
        $maitreApp = App::getInstance()->getTable('Utilisateur')->whoIs($contrat->idMaitreApprentissage, "maitreApprentissage", $_SESSION['auth'], $user->type);
        $formation = App::getInstance()->getTable('Utilisateur')->formation($_SESSION['auth']);
    }
    if($user->type !== 'tuteurPedagogique') {
        $tuteur = App::getInstance()->getTable('Utilisateur')->whoIs($contrat->idTuteurPedagogique, "tuteurPedagogique", $_SESSION['auth'], $user->type);
    }
    if($user->type !== 'apprenti') {
        $apprenti = App::getInstance()->getTable('Utilisateur')->whoIs($contrat->idApprenti, "apprenti", $_SESSION['auth'], $user->type);
    }
?>
<div id="content">
    <div class="conteneur">
        <div class="titre">
            <h1>Informations générales</h1>
        </div>
        <div class="contenu">
            <?php
            if($user->type === 'apprenti' || $user->type === 'tuteurPedagogique') {
                if($user->type === 'apprenti') {
                ?>
                    <h2>Formation actuelle</h2>
                <?php
                } elseif($user->type === 'tuteurPedagogique') {
                ?>
                    <h2>Formation de rattachement</h2>
                <?php
                }
            ?>
                <p><?= $formation->intituleFormation; ?></p>
                <span class="info"><?= $formation->nomComposante . ' - ' . $formation->villeComposante; ?></span>
            <?php
            }
            ?>
            <?php
            if($user->type !== 'apprenti') {
            ?>
                <h2>Apprenti</h2>
                <p><?= $apprenti->prenom . ' ' . $apprenti->nom; ?></p>
                <span class="info"><?= $apprenti->tel . ' - ' . $apprenti->port; ?></span>
                <br /><span class="info"><?= $apprenti->email; ?></span>
            <?php
            }
            if($user->type !== 'maitreApprentissage' && $maitreApp !== false) {
            ?>
                <h2>Maitre d'apprentissage</h2>
                <p><?= $maitreApp->prenom . ' ' . $maitreApp->nom; ?></p>
                <span class="info"><?= $maitreApp->tel . ' - ' . $maitreApp->port; ?></span>
                <br /><span class="info"><?= $maitreApp->email; ?></span>
            <?php
            }
            if($user->type !== 'tuteurPedagogique' && $tuteur !== false) {
            ?>
                <h2>Tuteur pédagogique</h2>
                <p><?= $tuteur->prenom . ' ' . $tuteur->nom; ?></p>
                <span class="info"><?= $tuteur->tel . ' - ' . $tuteur->port; ?></span>
                <br /><span class="info"><?= $tuteur->email; ?></span>
            <?php
            }
            ?>
        </div>
    </div>
    <div class="conteneur">
        <div class="titre">
            <h1>Important</h1>
        </div>
        <div class="contenu">
            <?php
            if($contrat->getSignature($user->type) === null) {
            ?>
            <h2>Contrat pédagogique</h2>
            <p>Vous devez impérativement signer le contrat pédagogique.</p>
            <?php
            }
            /*var_dump(App::getInstance()->getTable('Formulaire')->isComplete($_SESSION['auth']));*/
            /*foreach(App::getInstance()->getTable('Formulaire')->isComplete($_SESSION['auth']) as $forms) {
                var_dump($forms);
            }*/
            ?>
        </div>
    </div>
</div>

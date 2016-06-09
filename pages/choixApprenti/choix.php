<?php
$contracts = App::getInstance()->getTable('ContratApprentissage')->allWhere($_SESSION['auth'], $user->type);
?>
<h1>Sélectionnez l'apprenti à suivre</h1>
<table class="table">
    <thead>
        <tr>
            <td id="id-contrat">ID du contrat</td>
            <td id="nom-apprenti">Nom de l'apprenti suivi</td>
            <?php if($user->type === 'maitreApprentissage') {
            ?>
            <td id="formation">Formation</td>
            <td id="nom-tuteur-pedagogique">Tuteur pédagogique</td>
            <?php }
            if($user->type === 'tuteurPedagogique') {
            ?>
            <td id="entreprise">Entreprise</td>
            <td id="nom-maitre-apprentissage">Maître d'apprentissage</td>
            <?php
            }
            ?>
            <td class="selectionner">Sélectionner</td>
        </tr>
    </thead>
    <tbody>
        <?php foreach($contracts as $contract):
            $apprenti = App::getInstance()->getTable('Utilisateur')->find($contract->idApprenti);
            if($user->type === 'maitreApprentissage') {
                $formation = App::getInstance()->getTable('Utilisateur')->formation($apprenti->idUtilisateur);
                $tuteur = App::getInstance()->getTable('Utilisateur')->whoIs($contract->idTuteurPedagogique, "tuteurPedagogique", $_SESSION['auth'], $user->type);
            }
            if($user->type === 'tuteurPedagogique') {
                $maitreApp = App::getInstance()->getTable('Utilisateur')->whoIs($contract->idMaitreApprentissage, "maitreApprentissage", $_SESSION['auth'], $user->type);
                $entreprise = App::getInstance()->getTable('Utilisateur')->entreprise($maitreApp->idUtilisateur);
            }
        ?>
        <tr>
            <td headers="id-contrat"><?= $contract->idContratApprentissage; ?></td>
            <td headers="nom-apprenti"><?= $apprenti->getFullName(); ?></td>
            <?php if($user->type === 'maitreApprentissage') {
            ?>
            <td headers="formation"><?= $formation->intituleFormation; ?></td>
            <td headers="nom-tuteur-pedagogique"><?= $tuteur->getFullName(); ?></td>
            <?php }
            if($user->type === 'tuteurPedagogique') {
            ?>
            <td headers="entreprise"><?= $entreprise->raisonSocialeEntreprise; ?></td>
            <td headers="nom-maitre-apprentissage"><?= $maitreApp->getFullName(); ?></td>
            <?php
            }
            ?>
            <td headers="selectionner"><a href="private.php?id_contrat=<?= $contract->idContratApprentissage; ?>" class="btn btn-success">Sélectionner</a></td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>

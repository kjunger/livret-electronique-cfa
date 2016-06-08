<?php
$contracts = App::getInstance()->getTable('ContratApprentissage')->allWhere($_SESSION['auth'], $user->type);
?>
<h1>Sélectionnez l'apprenti à suivre</h1>
<table class="table">
    <thead>
        <tr>
            <td>ID du contrat</td>
            <td>Nom de l'apprenti suivi</td>
            <?php if($user->type === 'maitreApprentissage') {
            ?>
            <td>Formation</td>
            <td>Tuteur pédagogique</td>
            <?php }
            if($user->type === 'tuteurPedagogique') {
            ?>
            <td>Entreprise</td>
            <td>Maître d'apprentissage</td>
            <?php
            }
            ?>
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
            <td><?= $contract->idContratApprentissage; ?></td>
            <td><?= $apprenti->getFullName(); ?></td>
            <?php if($user->type === 'maitreApprentissage') {
            ?>
            <td><?= $formation->intituleFormation; ?></td>
            <td><?= $tuteur->getFullName(); ?></td>
            <?php }
            if($user->type === 'tuteurPedagogique') {
            ?>
            <td><?= $entreprise->raisonSocialeEntreprise; ?></td>
            <td><?= $maitreApp->getFullName(); ?></td>
            <?php
            }
            ?>
            <td><a href="private.php?id_contrat=<?= $contract->idContratApprentissage; ?>" class="btn btn-success">Sélectionner</a></td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>

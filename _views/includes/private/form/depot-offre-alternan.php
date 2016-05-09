<?php
if(isset($_GET['save'], $_GET['id_contrat'])) {
    require_once '../../../../_core/config.php';
    require_once '../../../../' . CLSS_DIR . '/fpdf.php';
    $fiche = new FPDF('P','mm','A4');
    $fiche->AddPage();
    $fiche->SetFont('Helvetica','B',18);
    $fiche->Cell(190,20,'Dépôt d\'offre d\'alternance',1,1,'C');
    $fiche->Output('F','../../../../_files/formulaires/Contrat' . $_GET['id_contrat'] . '-' . $_POST['nomContact'] . '-depotOffreAlternance.pdf',TRUE);
    header('Location:../../../../index.php');
}
?>
<h1>Dépôt d'offre d'alternance</h1>
<form action="<?php echo VIEW_DIR . '/' . INCLUDES; ?>/form/depot-offre-alternan.php?save=1&id_contrat=<?php echo $userInfo['user']['idcontrat']; ?>" method="post">
    <div class="conteneur large">
        <div class="titre">
            <h2>Entreprise</h2>
        </div>
        <div class="contenu">
                <input placeholder="Raison sociale" type="text" />
                <input placeholder="Adresse du siège social" type="text" />
                <input placeholder="Code postal" type="text" pattern="[0-9]{5}" />
                <input placeholder="Ville" type="text" />
                <input placeholder="Site Internet" type="text" />
                <input placeholder="Service de rattachement" type="text" />
        </div>
    </div>
    <div class="conteneur large">
        <div class="titre">
            <h2>Contact</h2>
        </div>
        <div class="contenu">
                <input placeholder="Nom" name="nomContact" type="text" value="<?php echo $userInfo['user']['nom'] ?>" />
                <input placeholder="Prénom" type="text" />
                <input placeholder="Email" type="email" />
                <input placeholder="Téléphone" type="tel" pattern="0[0-9]{9}"  />
                <input placeholder="Portable" type="tel" pattern="0[0-9]{9}"  />
                <input placeholder="Fonction" type="text" />
        </div>
    </div>
    <div class="conteneur large">
        <div class="titre">
            <h2>Détails</h2>
        </div>
        <div class="contenu">
            <textarea placeholder="Activité de l'entreprise"></textarea>
            <textarea placeholder="Intitulé et description du poste"></textarea>
            <textarea placeholder="Nature de la (des) mission(s) à accomplir par l'apprenti(e)"></textarea>
            <textarea placeholder="Profil de candidat souhaité"></textarea>
        </div>
    </div>
        <input type="submit" value="Valider" />
</form>
<?php
if(isset($_GET['save'])) {
    require_once CLSS_DIR . '/fpdf.php';
    $fiche = new FPDF('P','mm','A4');
    $fiche->AddPage();
    $fiche->SetFont('Helvetica','B',18);
    $fiche->Cell(190,20,'Dépôt d\'offre d\'alternance',1,1,'C');
    $fiche->Output('F','_files/formulaires/Contrat' . $userInfo['user']['idcontrat'] . '-' . $userInfo['user']['nom'] . '-' . $_GET['name'] . '.pdf',TRUE);
    $forms->setFormComplete($_GET['id'], '_files/formulaires/Contrat' . $userInfo['user']['idcontrat'] . '-' . $userInfo['user']['nom'] . '-' . $_GET['name'] . '.pdf');
    header('Location:index.php');
}
?>
<h1>Dépôt d'offre d'alternance</h1>
<form action="index.php?cat=<?php echo $_GET['cat']; ?>&id=<?php echo $_GET['id']; ?>&name=<?php echo $_GET['name']; ?>&save=1" method="post">
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
                <input placeholder="Prénom" type="text" value="<?php echo $userInfo['user']['prenom'] ?>" />
                <input placeholder="Email" type="email" value="<?php echo $userInfo['user']['email'] ?>" />
                <input placeholder="Téléphone" type="tel" pattern="0[0-9]{9}" value="<?php echo $userInfo['user']['tel'] ?>" />
                <input placeholder="Portable" type="tel" pattern="0[0-9]{9}" value="<?php echo $userInfo['user']['port'] ?>" />
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

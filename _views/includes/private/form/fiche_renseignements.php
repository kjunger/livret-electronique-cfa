<?php
if(isset($_GET['save'], $_GET['id_contrat'])) {
    require_once '../../../../_core/config.php';
    require_once '../../../../' . CLSS_DIR . '/fpdf.php';
    $fiche = new FPDF('P','mm','A4');
    $fiche->AddPage();
    $fiche->SetFont('Helvetica','B',18);
    $fiche->Cell(190,20,'Fiche de renseignements',0,1,'C');
    $fiche->SetFont('Helvetica','',15);
    $fiche->Cell(190,20,'Apprenti',0,1,'C');
    $fiche->SetFont('Helvetica','',11);
    $fiche->Cell(95,10,'Nom : ' . $_POST['nomApprenti']);
    $fiche->Cell(95,10,'Prénom : ' . $_POST['prenomApprenti'],0,1);
    $fiche->Cell(95,10,'Date de naissance : ' . $_POST['dateNaissanceApprenti']);
    $fiche->Cell(95,10,'Lieu de naissance : ' . $_POST['lieuNaissanceApprenti'],0,1);
    $fiche->Cell(190,10,'Adresse : ' . $_POST['adresseApprenti'],0,1);
    $fiche->Cell(55,10,'Code postal : ' . $_POST['cpApprenti']);
    $fiche->Cell(135,10,'Ville : ' . $_POST['villeApprenti'],0,1);
    $fiche->Cell(190,10,'Email : ' . $_POST['mailApprenti'],0,1);
    $fiche->Cell(95,10,'Téléphone : ' . $_POST['telApprenti']);
    $fiche->Cell(95,10,'Portable : ' . $_POST['portApprenti'],0,1);
    $fiche->SetFont('Helvetica','',15);
    $fiche->Cell(190,20,'Entreprise',0,1,'C');
    $fiche->SetFont('Helvetica','',11);
    $fiche->Cell(190,10,'Raison sociale : ' . $_POST['raisonSociale'],0,1);
    $fiche->Cell(190,10,'Adresse : ' . $_POST['adresseSiegeSocial'],0,1);
    $fiche->Cell(55,10,'Code postal : ' . $_POST['cpSiegeSocial']);
    $fiche->Cell(135,10,'Ville : ' . $_POST['villeSiegeSocial'],0,1);
    if(isset($_POST['adresseSiteAccueil'], $_POST['cpSiteAccueil'], $_POST['villeSiteAccueil'])) {
        $fiche->Cell(190,10,'Adresse du site d\'accueil (le cas échéant) : ' . $_POST['adresseSiteAccueil'],0,1);
        $fiche->Cell(55,10,'Code postal : ' . $_POST['cpSiteAccueil']);
        $fiche->Cell(135,10,'Ville : ' . $_POST['villeSiteAccueil']);
    }
    $fiche->SetFont('Helvetica','',15);
    $fiche->Cell(190,20,'Maître d\'apprentissage',0,1,'C');
    $fiche->SetFont('Helvetica','',11);
    $fiche->Output('F','../../../../_files/formulaires/Contrat' . $_GET['id_contrat'] . '-' . $_POST['nomApprenti'] . '-ficheRenseignements.pdf',TRUE);
    header('Location:../../../../index.php');
}
?>
<h1>Fiche de renseignements</h1>
<form action="<?php echo VIEW_DIR . '/' . INCLUDES; ?>/form/fiche_renseignements.php?save=1&id_contrat=<?php echo $userInfo['user']['idcontrat']; ?>" method="post">
    <div class="conteneur large">
        <div class="titre">
            <h1>Apprenti</h1>
        </div>
        <div class="contenu">
            <input placeholder="Nom" name="nomApprenti" type="text" value="<?php echo $userInfo['user']['nom']; ?>" />
            <input placeholder="Prénom" name="prenomApprenti" type="text" value="<?php echo $userInfo['user']['prenom']; ?>" />
            <input placeholder="Date de naissance (jj/mm/aaaa)" name="dateNaissanceApprenti" type="text" pattern="(^(((0[1-9]|1[0-9]|2[0-8])[\/](0[1-9]|1[012]))|((29|30|31)[\/](0[13578]|1[02]))|((29|30)[\/](0[4,6,9]|11)))[\/](19|[2-9][0-9])\d\d$)|(^29[\/]02[\/](19|[2-9][0-9])(00|04|08|12|16|20|24|28|32|36|40|44|48|52|56|60|64|68|72|76|80|84|88|92|96)$)" />
            <input placeholder="Lieu de naissance" name="lieuNaissanceApprenti" type="text" />
            <input placeholder="Adresse" name="adresseApprenti" type="text" value="<?php echo $userInfo['user']['adresse']; ?>" />
            <input placeholder="Code postal" name="cpApprenti" type="text" pattern="[0-9]{5}" value="<?php echo $userInfo['user']['cp']; ?>" />
            <input placeholder="Ville" name="villeApprenti" type="text" value="<?php echo $userInfo['user']['ville']; ?>" />
            <input placeholder="Email" name="mailApprenti" type="email" value="<?php echo $userInfo['user']['email']; ?>" />
            <input placeholder="Téléphone" name="telApprenti" type="tel" pattern="0[0-9]{9}" value="<?php echo $userInfo['user']['tel']; ?>" />
            <input placeholder="Portable" name="portApprenti" type="tel" pattern="0[0-9]{9}" value="<?php echo $userInfo['user']['port']; ?>" />
        </div>
    </div>
    <div class="conteneur large">
        <div class="titre">
            <h1>Entreprise</h1>
        </div>
        <div class="contenu">
            <input placeholder="Raison sociale" name="raisonSociale" type="text" />
            <h2>Siège social</h2>
            <input placeholder="Adresse du siège social" name="adresseSiegeSocial" type="text" />
            <input placeholder="Code postal" name="cpSiegeSocial" type="text" pattern="[0-9]{5}" />
            <input placeholder="Ville" name="villeSiegeSocial" type="text" />
            <h2>Site d'accueil de l'apprenti(e) <span class="info">(si différent du siège social)</span></h2>
            <input placeholder="Adresse du site d'accueil" name="adresseSiteAccueil" type="text" />
            <input placeholder="Code postal" name="cpSiteAccueil" type="text" pattern="[0-9]{5}" />
            <input placeholder="Ville" name="villeSiteAccueil" type="text" />
            <h2>Maître d'apprentissage</h2>
            <input placeholder="Nom" type="text" />
            <input placeholder="Prénom" type="text" />
            <input placeholder="Fonction" type="text" />
            <input placeholder="Email" type="email" />
            <input placeholder="Téléphone" type="tel" pattern="0[0-9]{9}" />
            <input placeholder="Portable" type="tel" pattern="0[6-7]{1}[0-9]{8}" />
        </div>
    </div>
    <input class="submit-field" type="submit" value="Valider" />
</form>
<?php
if(isset($_GET['save'])) {
    require_once CLSS_DIR . '/fpdf.php';
    $fiche = new FPDF('P','mm','A4');
    $fiche->AddPage();
    $fiche->SetFont('Helvetica','B',18);
    $fiche->Cell(190,20,'Insertion professionnelle et suivi des diplômés',1,1,'C');
    $fiche->Output('F','_files/formulaires/Contrat' . $userInfo['user']['idcontrat'] . '-' . $_POST['nomApprenti'] . '-insertionPro.pdf',TRUE);
    $forms->setFormComplete($_GET['id'], '_files/formulaires/Contrat' . $userInfo['user']['idcontrat'] . '-' . $userInfo['user']['nom'] . '-insertionPro.pdf');
    header('Location:index.php');
}
?>
<h1>Insertion professionnelle</h1>
<form action="index.php?cat=<?php echo $_GET['cat']; ?>&id=<?php echo $_GET['id']; ?>&name=<?php echo $_GET['name']; ?>&save=1" method="post">
    <div class="conteneur large">
        <div class="titre">
            <h1>Promotion <?php echo date('Y'); ?></h1>
        </div>
        <div class="contenu">
            <input placeholder="Nom" name="nomApprenti" type="text" value="<?php echo $userInfo['user']['nom']; ?>" />
            <input placeholder="Prénom" type="text" value="<?php echo $userInfo['user']['prenom']; ?>" />
            <input placeholder="Date de naissance" type="text" pattern="(^(((0[1-9]|1[0-9]|2[0-8])[\/](0[1-9]|1[012]))|((29|30|31)[\/](0[13578]|1[02]))|((29|30)[\/](0[4,6,9]|11)))[\/](19|[2-9][0-9])\d\d$)|(^29[\/]02[\/](19|[2-9][0-9])(00|04|08|12|16|20|24|28|32|36|40|44|48|52|56|60|64|68|72|76|80|84|88|92|96)$)" />
            <input placeholder="Âge" id="ageApprenti" type="text" />
            <p class="info">Adresse</p>
            <input placeholder="Adresse" type="text" value="<?php echo $userInfo['user']['adresse']; ?>" />
            <input placeholder="Code postal" type="text" value="<?php echo $userInfo['user']['cp']; ?>" />
            <input placeholder="Ville" type="text" value="<?php echo $userInfo['user']['ville']; ?>" />
            <input placeholder="Email" type="email" value="<?php echo $userInfo['user']['email']; ?>" />
            <input placeholder="Téléphone" type="text" pattern="0[0-9]{9}" value="<?php echo $userInfo['user']['tel']; ?>" />
            <input placeholder="Portable" type="text" pattern="0[0-9]{9}" value="<?php echo $userInfo['user']['port']; ?>" />
            <textarea placeholder="Autres renseignements (réseau social, blog, portfolio...)"></textarea>
        </div>
    </div>
    <h1>L'année prochaine... (remplissez le formulaire nécessaire)</h1>
    <div class="conteneur large">
        <div class="titre">
            <h1>Vous poursuivez vos études</h1>
        </div>
        <div class="contenu">
            <h2>Etablissement</h2>
            <input placeholder="Nom de l'établissement" id="nomEtablissementApp" type="text" />
            <input placeholder="Lieu (composante, IUT, etc.)" id="lieuEtablissementApp" type="text" />
            <input placeholder="Adresse" id="adresseEtablissementApp" type="text" />
            <input placeholder="Code postal" id="cpEtablissementApprenti" type="text" pattern="[0-9]{5}" />
            <input placeholder="Ville" id="villeEtablissementApprenti" type="text" />
            <input placeholder="Diplôme visé" id="diplomeEtablissementApprenti" type="text" />
            <select id="typeFormation" name="typeFormation">
                <option selected disabled>Type de formation</option>
                <option value="classique">Formation classique</option>
                <option value="alternance">Formation par alternance</option>
            </select>
            <div>
                <h2>Entreprise (si vous êtes en formation par alternance)</h2>
                <input placeholder="Raison sociale" type="text" />
                <input placeholder="Adresse du siège social" type="text" />
                <input placeholder="Complément d'adresse" type="text" />
                <input placeholder="Code postal" id="cpEntAltApp" type="text" pattern="[0-9]{5}" />
                <input placeholder="Ville" id="villeEntAltApp" type="text" />
                <input placeholder="Fonctions attachées au poste" type="text" />
            </div>
        </div>
    </div>
    <div class="conteneur large">
        <div class="titre">
            <h1>Vous avez trouvé un emploi</h1>
        </div>
        <div class="contenu">
            <select name="typeContrat">
                <option selected disabled>Type de Contrat</option>
                <option value="cdd">CDD</option>
                <option value="cdi">CDI</option>
            </select>
            <input placeholder="Fonctions attachées au poste" type="text" />
            <h2>Entreprise</h2>
            <input placeholder="Raison sociale" type="text" />
            <input placeholder="Adresse du siège social" type="text" />
            <input placeholder="Complément d'adresse" type="text" />
            <input placeholder="Code postal" type="text" pattern="[0-9]{5}" />
            <input placeholder="Ville" type="text" />
        </div>
    </div>
    <div class="conteneur large">
        <div class="titre">
            <h1>Vous êtes toujours en recherche d'emploi</h1>
        </div>
        <div class="contenu">
            <select name="mobilite">
                <option selected disabled>Mobilité</option>
                <option value="locale">Locale</option>
                <option value="regionale">Regionale</option>
            </select>
            <textarea id="souhaits" placeholder="Souhaits de fonction(s) ou d'entreprise(s)"></textarea>
        </div>
    </div>
    <div class="conteneur large">
        <div class="titre">
            <h1>L'association des Anciens</h1>
        </div>
        <div class="contenu">
            <p>Acceptez-vous l'inscription de ces données dans notre fichier des Anciens et à un éventuel contact entre votre composante et vous par la suite (transmission d'offres, information des anciens, proposition de témoignage...) ?</p>
            <input id="association" type="checkbox" />
            <label for="association" class="checkbox">Oui, je l'accepte.</label>
        </div>
    </div>
    <input class="submit-field" type="submit" value="Valider" />
</form>

<?php include('_includes/breadcrumbs.php'); ?>
<h4>Insertion professionnelle & suivi des diplômés</h4>
<form>
    <div>
        <span>Promotion <?php echo date('Y'); ?></span>
        <input placeholder="Nom" id="nomApprenti" type="text" required />
        <label for="nomApprenti">Nom</label>
        <input placeholder="Prénom" id="prenomApprenti" type="text" required />
        <label for="prenomApprenti">Prénom</label>
        <input placeholder="Date de naissance" id="dateNaissanceApprenti" type="text" pattern="(^(((0[1-9]|1[0-9]|2[0-8])[\/](0[1-9]|1[012]))|((29|30|31)[\/](0[13578]|1[02]))|((29|30)[\/](0[4,6,9]|11)))[\/](19|[2-9][0-9])\d\d$)|(^29[\/]02[\/](19|[2-9][0-9])(00|04|08|12|16|20|24|28|32|36|40|44|48|52|56|60|64|68|72|76|80|84|88|92|96)$)" required />
        <label for="dateNaissanceApprenti">Date de naissance - exemple : 20/02/1994</label>
        <input placeholder="Âge" id="ageApprenti" type="text" required />
        <label for="ageApprenti">Âge</label>
        <span>Adresse personnelle (en dehors du cadre des études, p.ex. parents)</span>
        <input placeholder="Adresse" id="adressePersoApprenti" type="text" required />
        <label for="adresseApprenti">Adresse</label>
        <input placeholder="Complément d'adresse" id="complementAdPersoApprenti" type="text" />
        <label for="complementAdApprenti">Complément d'adresse</label>
        <input placeholder="Code postal" id="cpPersoApprenti" type="text" pattern="[0-9]{5}" required />
        <label for="cpApprenti">Code postal</label>
        <input placeholder="Ville" id="villePersoApprenti" type="text" required />
        <label for="villeApprenti">Ville</label>
        <input placeholder="Email" id="mailApprenti" type="email" required />
        <label for="mailApprenti">Email</label>
        <input placeholder="Téléphone" id="telApprenti" type="tel" pattern="0[0-9]{9}" required />
        <label for="telApprenti">Téléphone</label>
        <input placeholder="Portable" id="portApprenti" type="tel" pattern="0[6-7]{1}[0-9]{8}" required />
        <label for="portApprenti">Portable</label>
        <textarea id="diversApprenti"></textarea>
        <label for="diversApprenti">Autres renseignements (réseau social, blog, portfolio...)</label>
    </div>
    <div>
        <span>L'année prochaine...</span>
        <select id="anneeProchaine" name="anneeProchaine" required>
            <option value="default" selected disabled>Choisissez une option...</option>
            <option value="poursuiteEtudes">Vous poursuivez vos études</option>
            <option value="recherchePoursuiteEtudes">Vous êtes toujours en recherche d'une poursuite d'études</option>
            <option value="emploi">Vous avez trouvé un emploi</option>
            <option value="rechercheEmploi">Vous êtes toujours en recherche d'un emploi</option>
        </select>
        <div id="choixAnneePro"></div>
    </div>
    <div>
        <span>L'association des Anciens</span>
        <p>Acceptez-vous l'inscription de ces données dans notre fichier des Anciens et à un éventuel contact entre votre composante et vous par la suite (transmission d'offres, information des Anciens, proposition de témoignage...) ?</p>
        <input type="checkbox" id="inscriptionAnciensApp" />
        <label for="inscriptionAnciensApp">Oui, je l'accepte.</label>
    </div>
</form>
<script type="application/javascript" src="_assets/js/formAppInsertionPro.js"></script>
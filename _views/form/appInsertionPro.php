<h1>Insertion professionnelle & suivi des diplômés</h1>
<form action="" method="">
    <div class="conteneur_large">
        <div class="titre">
            <h1>Promotion <?php echo date('Y'); ?></h1>
        </div>
        <div class="contenu">
            <input placeholder="Nom" id="nomApprenti" type="text" required />
            <input placeholder="Prénom" id="prenomApprenti" type="text" required />
            <input placeholder="Date de naissance" id="dateNaissanceApprenti" type="text" pattern="(^(((0[1-9]|1[0-9]|2[0-8])[\/](0[1-9]|1[012]))|((29|30|31)[\/](0[13578]|1[02]))|((29|30)[\/](0[4,6,9]|11)))[\/](19|[2-9][0-9])\d\d$)|(^29[\/]02[\/](19|[2-9][0-9])(00|04|08|12|16|20|24|28|32|36|40|44|48|52|56|60|64|68|72|76|80|84|88|92|96)$)" required />
            <input placeholder="Âge" id="ageApprenti" type="text" required />
            <p class="info">Adresse personnelle (en dehors du cadre des études, p.ex. parents)</p>
            <input placeholder="Adresse" id="adressePersoApprenti" type="text" required />
            <input placeholder="Complément d'adresse" id="complementAdPersoApprenti" type="text" />
            <input placeholder="Code postal" id="cpPersoApprenti" type="text" pattern="[0-9]{5}" required />
            <input placeholder="Ville" id="villePersoApprenti" type="text" required />
            <input placeholder="Email" id="mailApprenti" type="email" required />
            <input placeholder="Téléphone" id="telApprenti" type="tel" pattern="0[0-9]{9}" required />
            <input placeholder="Portable" id="portApprenti" type="tel" pattern="0[6-7]{1}[0-9]{8}" required />
            <textarea id="diversApprenti" placeholder="Autres renseignements (réseau social, blog, portfolio...)"></textarea>
        </div>
    </div>
    <div class="conteneur_large">
        <div class="titre">
            <h1>L'année prochaine...</h1>
        </div>
        <div class="contenu">
            <select id="anneeProchaine" name="anneeProchaine" required>
                <option value="default" selected disabled>Choisissez une option...</option>
                <option value="poursuiteEtudes">Vous poursuivez vos études</option>
                <option value="recherchePoursuiteEtudes">Vous êtes toujours en recherche d'une poursuite d'études</option>
                <option value="emploi">Vous avez trouvé un emploi</option>
                <option value="rechercheEmploi">Vous êtes toujours en recherche d'un emploi</option>
            </select>
            <div id="choixAnneePro"></div>
            <h2>L'association des anciens</h2>
            <p>Acceptez-vous l'inscription de ces données dans notre fichier des Anciens et à un éventuel contact entre votre composante et vous par la suite (transmission d'offres, information des anciens, proposition de témoignage...) ?</p>
            <input type="checkbox" id="inscriptionAnciensApp" />
            <label for="inscriptionAnciensApp" class="checkbox">Oui, je l'accepte.</label>
        </div>
    </div>
    <p class="btn">
        <input type="submit" value="Valider" />
    </p>
</form>
<script type="application/javascript">
    $('document').ready(function () {
        $('#anneeProchaine').change(function () {
            var choixSelect = $('#anneeProchaine option:selected').val();
            if (choixSelect != "recherchePoursuiteEtudes") {
                $('#choixAnneePro').load('_views/form/_includes/' + choixSelect + '.php');
            } else {
                $('#choixAnneePro').empty();
            }
        });
    });
</script>

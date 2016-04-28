<h1>Insertion professionnelle</h1>
<form action="" method="">
  <div class="conteneur large">
    <div class="titre">
      <h1>Promotion <?php echo date('Y'); ?></h1>
    </div>
    <div class="contenu">
      <input placeholder="Nom" id="nomApprenti" type="text" value="<?php echo $userInfo['user']['nom']; ?>" required />
      <input placeholder="Prénom" id="prenomApprenti" type="text" value="<?php echo $userInfo['user']['prenom']; ?>" required />
      <input placeholder="Date de naissance" id="dateNaissanceApprenti" type="text" pattern="(^(((0[1-9]|1[0-9]|2[0-8])[\/](0[1-9]|1[012]))|((29|30|31)[\/](0[13578]|1[02]))|((29|30)[\/](0[4,6,9]|11)))[\/](19|[2-9][0-9])\d\d$)|(^29[\/]02[\/](19|[2-9][0-9])(00|04|08|12|16|20|24|28|32|36|40|44|48|52|56|60|64|68|72|76|80|84|88|92|96)$)" required />
      <input placeholder="Âge" id="ageApprenti" type="text" required />
      <p class="info">Adresse</p>
      <input placeholder="Adresse" id="adresseApprenti" type="text" value="<?php echo $userInfo['user']['adresse']; ?>" required />
      <input placeholder="Code postal" id="cpApprenti" type="text" value="<?php echo $userInfo['user']['cp']; ?>" required />
      <input placeholder="Ville" id="villeApprenti" type="text" value="<?php echo $userInfo['user']['ville']; ?>" required />
      <input placeholder="Email" id="mailApprenti" type="email" value="<?php echo $userInfo['user']['email']; ?>" required />
      <input placeholder="Téléphone" id="telApprenti" type="text" pattern="0[0-9]{9}" value="<?php echo $userInfo['user']['tel']; ?>" required />
      <input placeholder="Portable" id="portApprenti" type="text" pattern="0[6-7]{1}[0-9]{9}" value="<?php echo $userInfo['user']['port']; ?>" required />
      <textarea placeholder="Autres renseignements (réseau social, blog, portfolio...)" id="diversApprenti"></textarea>
    </div>
  </div>
  <div class="conteneur large">
    <div class="titre">
      <h1>L'année prochaine...</h1>
    </div>
    <div class="contenu">
      <select class="basic" id="anneeProchaine" name="anneeProchaine" required>
        <option value="default" selected disabled>Choisissez une option...</option>
        <option value="poursuiteEtudes">Vous poursuivez vos études</option>
        <option value="recherchePoursuiteEtudes">Vous êtes toujours en recherche d'une poursuite d'études</option>
        <option value="emploi">Vous avez trouvé un emploi</option>
        <option value="rechercheEmploi">Vous êtes toujours en recherche d'un emploi</option>
      </select>
      <div id="choixAnneePro"></div>
        <h2>L'association des anciens</h2>
        <p>Acceptez-vous l'inscription de ces données dans notre fichier des Anciens et à un éventuel contact entre votre composante et vous par la suite (transmission d'offres, nformation des anciens, proposition de témoignage...) ?</p>
        <input type="checkbox" id="inscriptionAnciensApp" />
        <label for="inscriptionAnciensApp" class="checkbox">Oui, je l'accepte.</label>
      </div>
    </div>
    <input class="submit-field" type="submit" value="Valider" />
</form>
<script type="application/javascript">
    $('document').ready(function () {
        $('#anneeProchaine').change(function () {
            var choixSelect = $('#anneeProchaine option:selected').val();
            if (choixSelect != "recherchePoursuiteEtudes") {
                switch (choixSelect) {
                    case "poursuiteEtudes":
                        $('#choixAnneePro').empty();
                        $('#choixAnneePro').append('<h2>Etablissement</h2>\n\
                        <input placeholder="Nom de l\'établissement" id="nomEtablissementApp" type="text" required />\n\
                        <input placeholder="Lieu (composante, IUT, etc.)" id="lieuEtablissementApp" type="text" required />\n\
                        <input placeholder="Adresse" id="adresseEtablissementApp" type="text" required />\n\
                        <input placeholder="Code postal" id="cpEtablissementApprenti" type="text" pattern="[0-9]{5}" required />\n\
                        <input placeholder="Ville" id="villeEtablissementApprenti" type="text" required />\n\
                        <input placeholder="Diplôme visé" id="diplomeEtablissementApprenti" type="text" required />\n\
                        <p>Type de formation</p>\n\
                        <select id="typeFormation" name="typeFormation" required>\n\
                            <option selected disabled>Choisissez une option...</option>\n\
                            <option value="classique">Formation classique</option>\n\
                            <option value="alternance">Formation par alternance</option>\n\
                        </select>\n\
                        <div id="choixTypeFormation"></div>');
                        $('#typeFormation').change(function () {
                            var choixSelect = $('#typeFormation option:selected').val();
                            if (choixSelect == "alternance") {
                                $('#choixTypeFormation').empty();
                                $('#choixTypeFormation').append('<input placeholder="Fonctions attachées au poste" id="posteAlternanceApp" type="text" required />\n\
                                <h2>Entreprise</h2>\n\
                                <input placeholder="Raison sociale" id="raisonSocialeEntAltApp" type="text" required />\n\
                                <input placeholder="Adresse du siège social" id="adEntAltApp" type="text" required />\n\
                                <input placeholder="Complément d\'adresse" id="complementAdEntAltApp" type="text" required />\n\
                                <input placeholder="Code postal" id="cpEntAltApp" type="text" pattern="[0-9]{5}" required />\n\
                                <input placeholder="Ville" id="villeEntAltApp" type="text" required />');
                            } else {
                                $('#choixTypeFormation').empty();
                            }
                        });
                        break;
                    case "emploi":
                        $('#choixAnneePro').empty();
                        $('#choixAnneePro').append('<p>Type de Contrat</p>\n\
                        <select name="typeContrat" required>\n\
                            <option selected disabled>Choisissez une option...</option>\n\
                            <option value="cdd">CDD</option>\n\
                            <option value="cdi">CDI</option>\n\
                        </select>\n\
                        <input placeholder="Fonctions attachées au poste" id="posteEmploi" type="text" required />\n\
                        <h2>Entreprise</h2>\n\
                        <input placeholder="Raison sociale" id="raisonSocialeEnt" type="text" required />\n\
                        <input placeholder="Adresse du siège social" id="adEnt" type="text" required />\n\
                        <input placeholder="Complément d\'adresse" id="complementAdEnt" type="text" required />\n\
                        <input placeholder="Code postal" id="cpEnt" type="text" pattern="[0-9]{5}" required />\n\
                        <input placeholder="Ville" id="villeEnt" type="text" required />');
                        break;
                    case "rechercheEmploi":
                        $('#choixAnneePro').empty();
                        $('#choixAnneePro').append('<p>Mobilité</p>\n\
                        <select name="mobilite" required>\n\
                            <option selected disabled>Choisissez une option...</option>\n\
                            <option value="locale">Locale</option>\n\
                            <option value="regionale">Regionale</option>\n\
                        </select>\n\
                        <p>Souhaits de fonction(s) ou d\'entreprise(s)</p>\n\
                        <textarea id="souhaits"></textarea>');
                        break;
                }
            } else {
                $('#choixAnneePro').empty();
            }
        });
    });
</script>
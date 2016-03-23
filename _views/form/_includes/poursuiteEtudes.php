<h2>Etablissement</h2>
<input placeholder="Nom de l'établissement" id="nomEtablissementApp" type="text" required />
<input placeholder="Lieu (composante, IUT, etc.)" id="lieuEtablissementApp" type="text" required />
<input placeholder="Adresse" id="adresseEtablissementApp" type="text" required />
<input placeholder="Complément d'adresse" id="complementAdEtablissementApp" type="text" />
<input placeholder="Code postal" id="cpEtablissementApprenti" type="text" pattern="[0-9]{5}" required />
<input placeholder="Ville" id="villeEtablissementApprenti" type="text" required />
<input placeholder="Diplôme visé" id="diplomeEtablissementApprenti" type="text" required />
<p>Type de formation</p>
<select id="typeFormation" name="typeFormation" required>
    <option selected disabled>Choisissez une option...</option>
    <option value="classique">Formation classique</option>
    <option value="alternance">Formation par alternance</option>
</select>
<div id="choixTypeFormation"></div><!-- NE PAS SUPPRIMER CETTE DIV ! -->
<script type="application/javascript">
    $('#typeFormation').change(function () {
        var choixSelect = $('#typeFormation option:selected').val();
        if (choixSelect == "alternance") {
            $('#choixTypeFormation').load('_views/form/_includes/' + choixSelect + '.php');
        } else {
            $('#choixTypeFormation').empty();
        }
    });
</script>
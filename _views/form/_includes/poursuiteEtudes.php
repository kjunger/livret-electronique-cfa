<span>Etablissement</span>
<input placeholder="Nom de l'établissement" id="nomEtablissementApp" type="text" required />
<input placeholder="Lieu" id="lieuEtablissementApp" type="text" required />
<input placeholder="Adresse" id="adresseEtablissementApp" type="text" required />
<input placeholder="Complément d'adresse" id="complementAdEtablissementApp" type="text" />
<input placeholder="Code postal" id="cpEtablissementApprenti" type="text" pattern="[0-9]{5}" required />
<input placeholder="Ville" id="villeEtablissementApprenti" type="text" required />
<input placeholder="Diplôme visé" id="diplomeEtablissementApprenti" type="text" required />
<label for="typeFormation">Type de formation</label>
<select id="typeFormation" name="typeFormation" required>
    <option selected disabled>Choisissez une option...</option>
    <option value="classique">Formation classique</option>
    <option value="alternance">Formation par alternance</option>
</select>
<div id="choixTypeFormation"></div><!-- NE PAS SUPPRIMER CETTE DIV ! -->
<script type="application/javascript" src="_assets/js/formChoixTypeFormation.js"></script>
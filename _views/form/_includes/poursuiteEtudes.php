<span>Etablissement</span>
<input placeholder="Nom de l'établissement" id="nomEtablissementApp" type="text" required />
<label for="nomEtablissementApp">Nom de l'établissement</label>
<input placeholder="Lieu" id="lieuEtablissementApp" type="text" required />
<label for="lieuEtablissementApp">Lieu (composante, IUT, etc.)</label>
<input placeholder="Adresse" id="adresseEtablissementApp" type="text" required />
<label for="adresseEtablissementApp">Adresse</label>
<input placeholder="Complément d'adresse" id="complementAdEtablissementApp" type="text" />
<label for="complementAdEtablissementApp">Complément d'adresse</label>
<input placeholder="Code postal" id="cpEtablissementApprenti" type="text" pattern="[0-9]{5}" required />
<label for="cpEtablissementApprenti">Code postal</label>
<input placeholder="Ville" id="villeEtablissementApprenti" type="text" required />
<label for="villeEtablissementApprenti">Ville</label>
<input placeholder="Diplôme visé" id="diplomeEtablissementApprenti" type="text" required />
<label for="diplomeEtablissementApprenti">Diplôme visé</label>
<select id="typeFormation" name="typeFormation" required>
    <option selected disabled>Choisissez une option...</option>
    <option value="classique">Formation classique</option>
    <option value="alternance">Formation par alternance</option>
</select>
<label for="typeFormation">Type de formation</label>
<div id="choixTypeFormation"></div>   <!-- NE PAS SUPPRIMER CETTE DIV ! -->
<script type="application/javascript" src="_assets/js/formChoixTypeFormation.js"></script>
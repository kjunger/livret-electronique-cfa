<select name="typeContrat" required>
    <option selected disabled>Choisissez une option...</option>
    <option value="cdd">CDD</option>
    <option value="cdi">CDI</option>
</select>
<label for="mobilite">Type de Contrat</label>
<input placeholder="Fonctions attachées au poste" id="posteEmploi" type="text" required />
<label for="posteEmploi">Fonctions attachées au poste</label>
<span>Entreprise</span>
<input placeholder="Raison sociale" id="raisonSocialeEnt" type="text" required />
<label for="raisonSocialeEnt">Raison sociale</label>
<input placeholder="Adresse du siège social" id="adEnt" type="text" required />
<label for="adEnt">Adresse du siège social</label>
<input placeholder="Complément d'adresse" id="complementAdEnt" type="text" required />
<label for="complementAdEnt">Complément d'adresse</label>
<input placeholder="Code postal" id="cpEnt" type="text" pattern="[0-9]{5}" required />
<label for="cpEnt">Code postal</label>
<input placeholder="Ville" id="villeEnt" type="text" required />
<label for="villeEnt">Ville</label>
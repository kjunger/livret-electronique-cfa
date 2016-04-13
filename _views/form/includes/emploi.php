<p>Type de Contrat</p>
<select name="typeContrat" required>
    <option selected disabled>Choisissez une option...</option>
    <option value="cdd">CDD</option>
    <option value="cdi">CDI</option>
</select>
<input placeholder="Fonctions attachées au poste" id="posteEmploi" type="text" required />
<h2>Entreprise</h2>
<input placeholder="Raison sociale" id="raisonSocialeEnt" type="text" required />
<input placeholder="Adresse du siège social" id="adEnt" type="text" required />
<input placeholder="Complément d'adresse" id="complementAdEnt" type="text" required />
<input placeholder="Code postal" id="cpEnt" type="text" pattern="[0-9]{5}" required />
<input placeholder="Ville" id="villeEnt" type="text" required />

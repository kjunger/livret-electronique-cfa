<div class="content">
    <h1>Mission principale</h1>
    <form method="" action="">
        <div class="conteneur large">
            <div class="contenu">
                <h3>Description de la mission</h3>
                <textarea placeholder="Description..." id="description"></textarea>
                <h3>Réalisation de l'action</h3>
                <select id="realisation-action" name="realisation-action" required>
                    <option value="default" selected disabled>Choisissez une option...</option>
                    <option value="non-realisee">Non réalisée</option>
                    <option value="en-cours">En cours</option>
                    <option value="realisee">Réalisée</option>
                </select>
                <h3>Evaluation</h3>
                <select id="evaluation" name="evaluation" required>
                    <option value="default" selected disabled>Choisissez une option...</option>
                    <option value="5">Très satisfaisant</option>
                    <option value="4">Satisfaisant</option>
                    <option value="3">Moyen</option>
                    <option value="2">Insatisfaisant</option>
                    <option value="1">Très insatisfaisant</option>
                </select>
                <h3>Observations</h3>
                <textarea placeholder="Observations..." id="observations"></textarea>
            </div>
        </div>
        <input type="submit" value="Valider">
    </form>
</div>

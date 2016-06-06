<div class="content">
    <h1>Evaluation des missions ponctuelles</h1>
    <form method="" action="">
        <div class="conteneur large">
            <div class="contenu">
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
                    <option value="++">Très satisfait</option>
                    <option value="+">Satisfait</option>
                    <option value="+-">Moyen</option>
                    <option value="-">Insatisfaisant</option>
                    <option value="--">Très insatisfaisant</option>
                </select>
                <h3>Description des missions</h3>
                <textarea placeholder="Description..." id="description"></textarea>
                <h3>Observations</h3>
                <textarea placeholder="Observations..." id="observations"></textarea>
            </div>
        </div>
        <input type="submit" value="Valider">
    </form>
</div>

<?php include('_includes/breadcrumbs.php'); ?>
    <h4>Entrevues</h4>
    <form>
        <div>
            <span>Visite en entreprise</span>
            <input placeholder="Date de la visite" id="dateVisite" type="text" pattern="(^(((0[1-9]|1[0-9]|2[0-8])[\/](0[1-9]|1[012]))|((29|30|31)[\/](0[13578]|1[02]))|((29|30)[\/](0[4,6,9]|11)))[\/](19|[2-9][0-9])\d\d$)|(^29[\/]02[\/](19|[2-9][0-9])(00|04|08|12|16|20|24|28|32|36|40|44|48|52|56|60|64|68|72|76|80|84|88|92|96)$)" required />
            <label for="dateVisite">En date du... (exemple : 20/02/1994)</label>
            <span>Apprenti(e)</span>
            <input placeholder="Nom" id="nomApprenti" type="text" required />
            <label for="nomApprenti">Nom</label>
            <input placeholder="Prénom" id="prenomApprenti" type="text" required />
            <label for="prenomApprenti">Prénom</label>
            <span>Tuteur pédagogique</span>
            <input placeholder="Nom" id="nomTuteur" type="text" required />
            <label for="nomTuteur">Nom</label>
            <input placeholder="Prénom" id="prenomTuteur" type="text" required />
            <label for="prenomTuteur">Prénom</label>
            <span>Maître d'apprentissage</span>
            <input placeholder="Nom" id="nomMaitre" type="text" required />
            <label for="nomMaitre">Nom</label>
            <input placeholder="Prénom" id="prenomMaitre" type="text" required />
            <label for="prenomMaitre">Prénom</label>
            <span>Apprenti(e) présent(e) à l'entretien ?</span>
            <select id="presenceApp" name="presenceApp" required>
                <option value="default" selected disabled>Choisissez une option...</option>
                <option value="present">Oui</option>
                <option value="absent">Non</option>
            </select>
            <div id="choixPresenceApp"></div>
            <!-- NE PAS SUPPRIMER CETTE DIV ! -->
            <input placeholder="Durée de l'entretien" id="duree" type="text" required />
            <label for="duree">Durée de l'entretien</label>
            <span>Lieu de la soutenance (??)</span>
            <select id="lieu" name="lieu" required>
                <option value="default" selected disabled>Choisissez une option...</option>
                <option value="etablissement">Etablissement de l'apprenti(e)</option>
                <option value="entreprise">Entreprise</option>
            </select>
        </div>
    </form>
    <script type="application/javascript" src="_assets/js/formPresenceApp.js"></script>
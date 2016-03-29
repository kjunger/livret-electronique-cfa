<h1>Visites en entreprise</h1>
<form action="" method="">
    <div class="conteneur_large">
        <div class="contenu">
            <input placeholder="Date de la visite (JJ/MM/AAAA)" id="dateEntrevue" type="text" pattern="(^(((0[1-9]|1[0-9]|2[0-8])[\/](0[1-9]|1[012]))|((29|30|31)[\/](0[13578]|1[02]))|((29|30)[\/](0[4,6,9]|11)))[\/](19|[2-9][0-9])\d\d$)|(^29[\/]02[\/](19|[2-9][0-9])(00|04|08|12|16|20|24|28|32|36|40|44|48|52|56|60|64|68|72|76|80|84|88|92|96)$)" required />
            <h2>Apprenti(e)</h2>
            <input placeholder="Nom" id="nomApprenti" type="text" required />
            <input placeholder="Prénom" id="prenomApprenti" type="text" required />
            <h2>Tuteur pédagogique</h2>
            <input placeholder="Nom" id="nomTuteur" type="text" required />
            <input placeholder="Prénom" id="prenomTuteur" type="text" required />
            <h2>Maître d'apprentissage</h2>
            <input placeholder="Nom" id="nomMaitre" type="text" required />
            <input placeholder="Prénom" id="prenomMaitre" type="text" required />
            <p>Apprenti(e) présent(e) à l'entretien ?</p>
            <select id="presenceApp" name="presenceApp" required>
                <option value="default" selected disabled>Choisissez une option...</option>
                <option value="present">Oui</option>
                <option value="absent">Non</option>
            </select>
            <div id="choixPresenceApp"></div>
            <input placeholder="Durée de l'entretien" id="duree" type="text" required />
            <span>Lieu de la soutenance (??)</span>
            <select id="lieu" name="lieu" required>
                <option value="default" selected disabled>Choisissez une option...</option>
                <option value="etablissement">Etablissement de l'apprenti(e)</option>
                <option value="entreprise">Entreprise</option>
            </select>
        </div>
    </div>
    <p class="btn">
        <input type="submit" value="Valider" />
    </p>
</form>
<script type="application/javascript">
    $('#presenceApp').change(function () {
        var choixSelect = $('#presenceApp option:selected').val();
        if (choixSelect == "absent") {
            $('#choixPresenceApp').load('_views/form/_includes/' + choixSelect + '.php');
        } else {
            $('#choixPresenceApp').empty();
        }
    });
</script>

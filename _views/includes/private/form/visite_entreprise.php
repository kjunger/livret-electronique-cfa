<?php
    if(isset($_GET['save'])) {
        //Ecrire directives pour l'enregistrement en PDF
        $forms->setFormComplete($_GET['id'], '_files/formulaires/Contrat' . $userInfo['user']['idcontrat'] . '-' . $userInfo['user']['nom'] . '-' . $_GET['name'] . '.pdf');
        header('Location:index.php');
    }
?>
<h1>Visites en entreprise</h1>
<form action="index.php?cat=<?php echo $_GET['cat']; ?>&id=<?php echo $_GET['id']; ?>&name=<?php echo $_GET['name']; ?>&save=1" method="post">
    <div class="conteneur large">
        <div class="contenu">
            <input placeholder="Date de la visite (jj/mm/aaaa)" id="dateEntrevue" type="text" pattern="(^(((0[1-9]|1[0-9]|2[0-8])[\/](0[1-9]|1[012]))|((29|30|31)[\/](0[13578]|1[02]))|((29|30)[\/](0[4,6,9]|11)))[\/](19|[2-9][0-9])\d\d$)|(^29[\/]02[\/](19|[2-9][0-9])(00|04|08|12|16|20|24|28|32|36|40|44|48|52|56|60|64|68|72|76|80|84|88|92|96)$)" />
            <h2>Apprenti(e)</h2>
            <input placeholder="Nom" type="text" />
            <input placeholder="Prénom" type="text" />
            <h2>Tuteur pédagogique</h2>
            <input placeholder="Nom" type="text" />
            <input placeholder="Prénom" type="text" />
            <h2>Maître d'apprentissage</h2>
            <input placeholder="Nom" type="text" />
            <input placeholder="Prénom" type="text" />
            <select id="presenceApp" name="presenceApp">
                <option value="default" selected disabled>Apprenti(e) présent(e) à l'entretien ?</option>
                <option value="present">Oui</option>
                <option value="absent">Non</option>
            </select>
            <textarea placeholder="Si non, pourquoi ?"></textarea>
            <input placeholder="Durée de l'entretien" type="text" />
            <select id="lieu" name="lieu">
                <option value="default" selected disabled>Lieu de la soutenance</option>
                <option value="etablissement">Etablissement de l'apprenti(e)</option>
                <option value="entreprise">Entreprise</option>
            </select>
        </div>
    </div>
    <input class="submit-field" type="submit" value="Valider" />
</form>

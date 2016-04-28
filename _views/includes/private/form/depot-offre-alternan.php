<h1>Dépôt d'offre d'alternance</h1>
<form action="" method="">
    <div class="conteneur large">
        <div class="titre">
            <h2>Entreprise</h2>
        </div>
        <div class="contenu">
                <input placeholder="Raison sociale" id="raisonSocialeEnt" type="text" required />
                <input placeholder="Adresse du siège social" id="adSiege" type="text" required />
                <input placeholder="Code postal" id="cpSiege" type="text" pattern="[0-9]{5}" required />
                <input placeholder="Ville" id="villeSiege" type="text" required />
                <input placeholder="Site Internet" id="siteInternet" type="text" required />
                <input placeholder="Service de rattachement" id="serviceRattachement" type="text" required />
        </div>
    </div>
    <div class="conteneur large">
        <div class="titre">
            <h2>Contact</h2>
        </div>
        <div class="contenu">
                <input placeholder="Nom" id="nomApprenti" type="text" required />
                <input placeholder="Prénom" id="prenomApprenti" type="text" required />
                <input placeholder="Email" id="mailApprenti" type="email" required />
                <input placeholder="Téléphone" id="telApprenti" type="tel" pattern="0[0-9]{9}"  required />
                <input placeholder="Portable" id="portApprenti" type="tel" pattern="0[6-7]{1}[0-9]{8}"  required />
                <input placeholder="Fonction" id="fonctionMaitreApp" type="text" required />
        </div>
    </div>
    <div class="conteneur large">
        <div class="titre">
            <h2>Détails</h2>
        </div>
        <div class="contenu">
            <textarea placeholder="Activité de l'entreprise"></textarea>
            <textarea placeholder="Intitulé et description du poste"></textarea>
            <textarea placeholder="Nature de la (des) mission(s) à accomplir par l'apprenti(e)"></textarea>
            <textarea placeholder="Profil de candidat souhaité"></textarea>
        </div>
    </div>
        <input type="submit" value="Valider" />
</form>
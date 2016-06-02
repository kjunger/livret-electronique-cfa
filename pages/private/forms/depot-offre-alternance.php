<div class="content">
    <h1>Dépôt d'offre d'alternance</h1>
    <form action="" method="post">
        <div class="conteneur large">
            <div class="titre">
                <h2>Entreprise</h2>
            </div>
            <div class="contenu">
                <input placeholder="Raison sociale" type="text" />
                <input placeholder="Adresse du siège social" type="text" />
                <input placeholder="Code postal" type="text" pattern="[0-9]{5}" />
                <input placeholder="Ville" type="text" />
                <input placeholder="Site Internet" type="text" />
                <input placeholder="Service de rattachement" type="text" />
            </div>
        </div>
        <div class="conteneur large">
            <div class="titre">
                <h2>Contact</h2>
            </div>
            <div class="contenu">
                <input placeholder="Nom" name="nomContact" type="text" value="" />
                <input placeholder="Prénom" type="text" value="" />
                <input placeholder="Email" type="email" value="" />
                <input placeholder="Téléphone" type="tel" pattern="0[0-9]{9}" value="" />
                <input placeholder="Portable" type="tel" pattern="0[0-9]{9}" value="" />
                <input placeholder="Fonction" type="text" />
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
</div>

<h1>Autorisation de communication des résultats scolaires</h1>
<form action="" method="">
    <div class="conteneur large">
        <div class="titre">
            <h1>Promotion <?php echo date('Y'); ?></h1>
        </div>
        <div class="contenu">
            <p>Je soussigné, M./Mme <?php echo $userInfo['user']['prenom'] . ' ' . $userInfo['user']['nom']; ?>, autorise l'<?php echo $userInfo['formation']['composante']; ?> à communiquer mes résultats universitaires, dans le cadre de mon cursus en <?php echo $userInfo['formation']['intitule']; ?> en alternance, au maître d'apprentissage dont je dépends.</p>
            <input id="signature" type="checkbox" />
            <label for="signature">Oui, je m'y engage.</label>
            <p>
                <input type="password" placeholder="Entrez votre mot de passe" />
            </p>
        </div>
    </div>
    <input class="submit-field" type="submit" value="Valider" />
</form>
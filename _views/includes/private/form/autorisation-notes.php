<?php
    if(isset($_GET['save'])) {
        $forms->setFormComplete($_GET['id'], '_files/formulaires/Contrat' . $userInfo['user']['idcontrat'] . '-' . $userInfo['user']['nom'] . '' . $_GET['name'] . '.pdf');
        header('Location:index.php');
    }
?>
<h1>Autorisation de communication des résultats scolaires</h1>
<form action="index.php?cat=<?php echo $_GET['cat']; ?>&id=<?php echo $_GET['id']; ?>&name=<?php echo $_GET['name']; ?>&save=1" method="post">
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

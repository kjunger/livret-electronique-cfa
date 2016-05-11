<?php
    if(isset($_GET['save'])) {
        //Ecrire directives pour l'enregistrement en PDF
        $forms->setFormComplete($_GET['id'], '_files/formulaires/Contrat' . $userInfo['user']['idcontrat'] . '-' . $userInfo['user']['nom'] . '-' . $_GET['name'] . '.pdf');
        header('Location:index.php');
    }
?>
<h1>Bilan de l'année</h1>
<form action="index.php?cat=<?php echo $_GET['cat']; ?>&id=<?php echo $_GET['id']; ?>&name=<?php echo $_GET['name']; ?>&save=1" method="post">
    <div class="conteneur large">
        <div class="contenu">
            <textarea placeholder="Bilan" id="bilan"></textarea>
            <textarea placeholder="Commentaires suite à la soutenance" id="commentaires"></textarea>
        </div>
    </div>
    <p class="btn">
        <input type="submit" value="Valider" />
    </p>
</form>

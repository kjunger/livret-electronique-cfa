<img src="_templates/login/assets/img/lesa.png" alt="logo" />
<div id="content">
    <h2>Bienvenue, <span>veuillez vous connecter.</span></h2>
    <form method="post" action="index.php?login=1">
        <select name="situation" required>
            <option value="default" selected disabled>Sélectionnez votre situation</option>
            <option value="Apprenti">Apprenti(e)</option>
            <option value="MaitreApprentissage">Maître d'apprentissage</option>
            <option value="TuteurPedagogique">Tuteur pédagogique</option>
        </select>
        <input placeholder="Login" name="login" type="text" required />
        <input placeholder="Mot de passe" name="mdp" type="password" required />
        <p class="btn">
            <input type="submit" value="Valider" />
        </p>
    </form>
    <div class="error">
        <?php
        if (isset($_GET['error'])) {
            echo "L'identification a échoué. Veuillez réessayer.";
        }
    ?>
    </div>
</div>

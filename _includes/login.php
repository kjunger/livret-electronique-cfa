<!DOCTYPE html>
<html lang="fr">

<head>
    <title>Livret Electronique de Suivi de l'Apprenti - Université de Rouen</title>
    <meta charset="utf-8" />
    <link type="text/css" rel="stylesheet" href="_assets/css/styleLogin.css" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
</head>

<body>
    <div class="conteneur">
        <div class="titre">
            <h1>Livret Electronique de Suivi de l'Apprenti(e)</h1>
        </div>
        <div class="contenu">
            <form method="post" action="_scripts/scriptLogin.php">
                <select name="situation" required>
                    <option value="default" selected disabled>Sélectionnez votre situation</option>
                    <option value="apprenti">Apprenti(e)</option>
                    <option value="">Maît../...re d'apprentissage</option>
                    <option value="">Tuteur pédagogique</option>
                    <option value="">Responsable pédagogique</option>
                    <option value="">Responsabe CFA</option>
                </select>
                <input placeholder="Login" name="login" type="text" required />
                <input placeholder="Mot de passe" name="mdp" type="password" required />
                <p class="btn">
                    <input type="submit" value="Valider" />
                </p>
            </form>
        </div>
    </div>
</body>

</html>
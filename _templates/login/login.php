<?php
if (isset($_POST['situation']) && isset($_POST['login']) && isset($_POST['mdp']))
{
	$db = dbInit('LivretElectroniq', '10.0.2.15', 'LivretElectroniq', 'test');
	$answer = dbSelect("SELECT * FROM `" . $_POST['situation'] . "` WHERE `" . $_POST['situation'] . "`.`login" . $_POST['situation'] . "`='" . $_POST['login'] . "' AND `" . $_POST['situation'] . "`.`mdp" . $_POST['situation'] . "`='" . md5($_POST['mdp']) . "';", $db);
	if (count($answer) == 1)
	{
		$_SESSION['user'] = new $_POST['situation']($answer[0]['login' . $_POST['situation']], $answer[0]['prenom' . $_POST['situation']] . ' ' . $answer[0]['nom' . $_POST['situation']], $answer[0]['mail' . $_POST['situation']], $answer[0]['tel' . $_POST['situation']], $answer[0]['port' . $_POST['situation']]);
		$userGetClass = get_class($_SESSION['user']);
		switch ($userGetClass)
		{
			case "Apprenti":
				$_SESSION['user']->whoIsMaitreApprentissage($db);
				$_SESSION['user']->whoIsTuteurPedagogique($db);
				$_SESSION['user']->aboutFormation($db);
				break;
			case "MaitreApprentissage":
				$_SESSION['user']->whoIsApprenti($db);
				$_SESSION['user']->aboutCompany($db);
				break;
		}
		header('Location:index.php');
	}
	else
	{
		header('Location:index.php?error');
	}
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
	<title>Livret Electronique de Suivi de l'Apprenti - Université de Rouen</title>
	<meta charset="utf-8" />
	<link type="text/css" rel="stylesheet" href="_templates/login/assets/css/styleLogin.css" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
</head>
<body>
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
			if (isset($_GET['error']))
			{
				echo "L'identification a échoué. Veuillez réessayer.";
			}
			?>
		</div>
	</div>
</body>
</html>

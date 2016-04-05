<?php
function userLogout()
{
	unset($_SESSION['login']);
	unset($_SESSION['situation']);
	session_destroy();
	header('Location:index.php');
}
function userName($database, $login, $usrType)
{
	$answer = dbSelect("SELECT `$usrType`.`prenom" . $usrType . "`, `$usrType`.`nom" . $usrType . "` FROM `$usrType` WHERE `$usrType`.`login" . $usrType . "`='$login';", $database);
	if (count($answer) == 1) {
		echo $answer[0]['prenom' . $usrType] . ' ' . $answer[0]['nom' . $usrType];
	}
}
function subLinks($database, $cat)
{
	$answer = dbSelect("SELECT * FROM `FormulaireStandard` WHERE `FormulaireStandard`.`catFormulaireStandard`='$cat';", $database);
	foreach($answer as $row) {
		echo '<li><a href="index.php?cat=' . $row['catFormulaireStandard'] . '&amp;slug=' . $row['slugFormulaireStandard'] . '">' . $row['nomFormulaireStandard'] . '</a></li>';
	}
}
function breadcrumbs($database, $cat, $slug)
{
	switch ($cat) {
	case "form":
		echo 'Formulaires > ';
		$answer = dbSelect("SELECT `FormulaireStandard`.`nomFormulaireStandard` FROM `FormulaireStandard` WHERE `FormulaireStandard`.`slugFormulaireStandard`='" . $slug . "';", $database);
		if (count($answer) == 1) {
			echo $answer[0]['nomFormulaireStandard'];
		}
		break;
	}
}
function controller($database, $slug)
{
	$answer = dbSelect("SELECT * FROM `FormulaireStandard` WHERE `FormulaireStandard`.`slugFormulaireStandard`='" . $slug . "';", $database);
	if (count($answer) == 1) {
		echo $answer[0]['contenuFormulaireStandard'];
	}
	else {
		echo 'La page que vous cherchez à consulter n\'existe pas.';
	}
}
function homeGeneralInfos($database, $login, $usrType)
{
	switch ($usrType) {
	case "Apprenti":
		echo "<h2>Formation actuelle</h2><p>";
		$answer = dbSelect("SELECT `Formation`.`intituleFormation` FROM `Formation` INNER JOIN `Apprenti` ON `Formation`.`idFormation`=`Apprenti`.`idFormation` WHERE `Apprenti`.`loginApprenti`='$login';", $database);
		if (count($answer) == 1) {
			echo $answer[0]['intituleFormation'];
		}
		echo "</p><h2>Entreprise</h2><p>";
		$answer = dbSelect("SELECT `Entreprise`.`raisonSocialeEntreprise` FROM `Entreprise` INNER JOIN (`MaitreApprentissage` INNER JOIN (`ContratApprentissage` INNER JOIN `Apprenti` ON `ContratApprentissage`.`idApprenti`=`Apprenti`.`idApprenti`) ON `MaitreApprentissage`.`idMaitreApprentissage`=`ContratApprentissage`.`idMaitreApprentissage`) ON `Entreprise`.`idEntreprise`=`MaitreApprentissage`.`idEntreprise` WHERE `Apprenti`.`loginApprenti`='$login';", $database);
		if (count($answer) == 1) {
			echo $answer[0]['raisonSocialeEntreprise'];
		}
		echo "</p><h2>Maître d'apprentissage</h2><p>";
		$answer = dbSelect("SELECT `MaitreApprentissage`.`nomMaitreApprentissage`,`MaitreApprentissage`.`prenomMaitreApprentissage`,`MaitreApprentissage`.`fonctionMaitreApprentissage` FROM `MaitreApprentissage` INNER JOIN (`ContratApprentissage` INNER JOIN `Apprenti` ON `ContratApprentissage`.`idApprenti`=`Apprenti`.`idApprenti`) ON `MaitreApprentissage`.`idMaitreApprentissage`=`ContratApprentissage`.`idMaitreApprentissage` WHERE `Apprenti`.`loginApprenti`='$login';", $database);
		if (count($answer) == 1) {
			echo $answer[0]['prenomMaitreApprentissage'] . ' ' . $answer[0]['nomMaitreApprentissage'] . '<br /> ' . $answer[0]['fonctionMaitreApprentissage'];
		}
		echo "</p><h2>Tuteur pédagogique</h2><p>";
		$answer = dbSelect("SELECT `TuteurPedagogique`.`nomTuteurPedagogique`,`TuteurPedagogique`.`prenomTuteurPedagogique` FROM `TuteurPedagogique` INNER JOIN (`ContratApprentissage` INNER JOIN `Apprenti` ON `ContratApprentissage`.`idApprenti`=`Apprenti`.`idApprenti`) ON `TuteurPedagogique`.`idTuteurPedagogique`=`ContratApprentissage`.`idTuteurPedagogique` WHERE `Apprenti`.`loginApprenti`='$login';", $database);
		if (count($answer) == 1) {
			echo $answer[0]['prenomTuteurPedagogique'] . ' ' . $answer[0]['nomTuteurPedagogique'];
		}
		echo "</p>";
		break;
	}
}
?>

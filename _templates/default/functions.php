<?php
function userLogout()
{
	unset($_SESSION['user']);
	session_destroy();
	header('Location:index.php');
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
function homeGeneralInfos(/*$pDatabase, $pLogin, $pType*/$pUser)
{
	$userGetClass = get_class($pUser);
	switch ($userGetClass) {
		case "Apprenti":
			echo "<h2>Entreprise</h2><p>";
			$company = $pUser->getCompanyInfos();
			echo $company['companyName'] . "</p><h2>Maître d'apprentissage</h2><p>";
			$maitreApprentissage = $pUser->getMaitreApprentissageInfos();
			echo $maitreApprentissage['nameMaitreApprentissage'] . "<br />" . $maitreApprentissage['functionMaitreApprentissage'] . "</p><h2>Tuteur pédagogique</h2><p>";
			$tuteurPedagogique = $pUser->getTuteurPedagogiqueInfos();
			echo $tuteurPedagogique['nameTuteurPedagogique'] . '</h1>';
	}
}
?>

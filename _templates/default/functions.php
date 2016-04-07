<?php
function displaySubLinks($database, $cat)
 {
  $answer = dbSelect("SELECT * FROM `FormulaireStandard` WHERE `FormulaireStandard`.`catFormulaireStandard`='$cat';", $database);
  foreach($answer as $row)
   {
    echo '<li><a href="index.php?cat=' . $row['catFormulaireStandard'] . '&amp;slug=' . $row['slugFormulaireStandard'] . '">' . $row['nomFormulaireStandard'] . '</a></li>';
   }
 }
function displayBreadcrumbs($database, $cat, $slug)
 {
  switch ($cat)
   {
  case "form":
    echo 'Formulaires > ';
    $answer = dbSelect("SELECT `FormulaireStandard`.`nomFormulaireStandard` FROM `FormulaireStandard` WHERE `FormulaireStandard`.`slugFormulaireStandard`='" . $slug . "';", $database);
    if (count($answer) == 1)
     {
      echo $answer[0]['nomFormulaireStandard'];
     }
    break;
   }
 }
function viewController($database, $slug)
 {
  $answer = dbSelect("SELECT * FROM `FormulaireStandard` WHERE `FormulaireStandard`.`slugFormulaireStandard`='" . $slug . "';", $database);
  if (count($answer) == 1)
   {
    echo $answer[0]['contenuFormulaireStandard'];
   }
  else
   {
    echo "La page que vous cherchez à consulter n'existe pas.";
   }
 }
function userDisplayName($pUser)
 {
  $user = $pUser->getUserBasicInfos();
  echo $user['name'];
 }
function userDisplayGeneralInfos($pUser)
 {
  $userGetClass = get_class($pUser);
  switch ($userGetClass)
   {
  case "Apprenti":
    echo '<h2>Formation suivie</h2><p>';
    $formation = $pUser->getFormationInfos();
    echo $formation['nameFormation'] . '<br /><span class="info">' . $formation['nameComposante'] . '<br />Représentant pédagogique : ' . $formation['nameRepresentantPedagogique'] . '<br />Téléphone : ' . $formation['telRepresentantPedagogique'] . ' - Portable : ' . $formation['cellRepresentantPedagogique'] . '<br />Email : ' . $formation['mailRepresentantPedagogique'] . '</span></p><h2>Entreprise</h2><p>';
    $company = $pUser->getCompanyInfos();
    echo $company['companyName'] . '<br /><span class="info">' . $company['companyAdress'] . "</span></p><h2>Maître d'apprentissage</h2><p>";
    $maitreApprentissage = $pUser->getMaitreApprentissageInfos();
    echo $maitreApprentissage['nameMaitreApprentissage'] . '<br/><span class="info">' . $maitreApprentissage['functionMaitreApprentissage'] . '<br/>Téléphone : ' . $maitreApprentissage['telMaitreApprentissage'] . " - Portable : " . $maitreApprentissage['cellMaitreApprentissage'] . '<br/>Email : ' . $maitreApprentissage['mailMaitreApprentissage'] . '</span></p><h2>Tuteur pédagogique</h2><p>';
    $tuteurPedagogique = $pUser->getTuteurPedagogiqueInfos();
    echo $tuteurPedagogique['nameTuteurPedagogique'] . '<span class="info"><br />Téléphone : ' . $tuteurPedagogique['telTuteurPedagogique'] . ' - Portable : ' . $tuteurPedagogique['cellTuteurPedagogique'] . '<br />Email : ' . $tuteurPedagogique['mailTuteurPedagogique'] . '</span></p>';
   }
 }
function userLogout()
 {
  unset($_SESSION['user']);
  session_destroy();
  header('Location:index.php');
 }
?>
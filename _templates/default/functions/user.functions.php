<?php
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
    break;

  case "MaitreApprentissage":
    echo '<h2>Votre entreprise</h2><p>';
    $company = $pUser->getCompanyInfos();
    echo $company['companyName'] . '<br /><span class="info">' . $company['companyAdress'] . '</span></p>';
    break;
  }
}
function userLogout()
{
  unset($_SESSION['user']);
  session_destroy();
  header('Location:index.php');
}
?>
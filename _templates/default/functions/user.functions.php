<?php

    function userGetAllInfos($pUser)
    {
        $userGetClass = get_class($pUser);
        switch ($userGetClass) {
            case "Apprenti":
                $userInfos = array(
                    'user' => $pUser->getUserBasicInfos(),
                    'maitreApprentissage' => $pUser->getMaitreApprentissageInfos(),
                    'company' => $pUser->getCompanyInfos(),
                    'tuteurPedagogique' => $pUser->getTuteurPedagogiqueInfos(),
                    'formation' => $pUser->getFormationInfos()
                );
                break;
            case "MaitreApprentissage":
                $userInfos = array(
                  'user' => $pUser->getUserBasicInfos(),
                  'apprenti' => $pUser->getApprentiInfos(),
                  'tuteurPedagogique' => $pUser->getTuteurPedagogiqueInfos(),
                  'company' => $pUser->getCompanyInfos()
                );
                break;
            case "TuteurPedagogique":
                $userInfos = array(
                  'user' => $pUser->getUserBasicInfos(),
                  'apprenti' => $pUser->getApprentiInfos(),
                  'maitreApprentissage' => $pUser->getTuteurPedagogiqueInfos()
                );
                break;
        }
        return $userInfos;
    }

    function userDisplayGeneralInfos($pUser,$pUserInfos)
    {
        $userGetClass = get_class($pUser);
        switch ($userGetClass)
        {
        case "Apprenti":
            echo '<h2>Formation suivie</h2><p>' . $pUserInfos['formation']['nameFormation'] . '<br /><span class="info">' . $pUserInfos['formation']['nameComposante'] . '</span></p>';
            // echo '<h2>Formation suivie</h2><p>';
            // $formation = $pUser->getFormationInfos();
            // echo $formation['nameFormation'] . '<br /><span class="info">' . $formation['nameComposante'] . '</span></p><h2>Entreprise</h2><p>';
            // $company = $pUser->getCompanyInfos();
            // echo $company['companyName'] . "</p><h2>Maître d'apprentissage</h2><p>";
            // $maitreApprentissage = $pUser->getMaitreApprentissageInfos();
            // echo $maitreApprentissage['nameMaitreApprentissage'] . '</p><h2>Tuteur pédagogique</h2><p>';
            // $tuteurPedagogique = $pUser->getTuteurPedagogiqueInfos();
            // echo $tuteurPedagogique['nameTuteurPedagogique'] . '</p>';
            break;

        case "MaitreApprentissage":
            echo '<h2>Votre entreprise</h2><p>';
            $company = $pUser->getCompanyInfos();
            echo $company['companyName'] . "</p><h2>L'apprenti suivi</h2><p>";
            $apprenti = $pUser->getApprentiInfos();
            echo $apprenti['nameApprenti'] . '</p><h2>Tuteur pédagogique</h2><p>';
            $tuteurPedagogique = $pUser->getTuteurPedagogiqueInfos();
            echo $tuteurPedagogique['nameTuteurPedagogique'] . '</p>';
            break;

        case "TuteurPedagogique":
            echo "<h2>L'apprenti suivi</h2><p>";
            $apprenti = $pUser->getApprentiInfos();
            echo $apprenti['nameApprenti'] . "</p><h2>Maître d'apprentissage</h2><p>";
            $maitreApprentissage = $pUser->getMaitreApprentissageInfos();
            echo $maitreApprentissage['nameMaitreApprentissage'] . '</p>';
            break;
        }
    }

    function userDisplayImportantInfos($pUser, $pDatabase)
    {
        $userGetClass = get_class($pUser);
        switch ($userGetClass)
        {
        case "Apprenti":
            $user = $pUser->getUserBasicInfos();
            $answer = dbSelect("SELECT * FROM `DroitsFormulaireStandard` INNER JOIN (`ContratApprentissage` INNER JOIN `Apprenti` ON `ContratApprentissage`.`idApprenti`=`Apprenti`.`idApprenti`) ON `DroitsFormulaireStandard`.`idContratApprentissage`=`ContratApprentissage`.`idContratApprentissage` WHERE `loginApprenti`='" . $user['name'] . "';", $pDatabase);
            foreach($answer as $row)
            {
                if ($row['droitsApprentiDroitsFormulaireStandard'] == 2 && $row['aCompleteApprentiDroitsFormulaireStandard'] == NULL)
                {
                    echo '<h2>Formulaire à compléter</h2><p>Vous devez compléter le formulaire suivant : ' . $row['idFormulaireStandard'] . '</p>';
                }
            }

            break;
            /*case "MaitreApprentissage":
            break;
            case "TuteurPedagogique":
            break;*/
        }
    }

    function userLogout()
    {
        unset($_SESSION['user']);
        session_destroy();
        header('Location:index.php');
    }

?>

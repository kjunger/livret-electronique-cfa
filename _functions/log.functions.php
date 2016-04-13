<?php
    function login($pDatabase) {
        $answer = dbSelect("SELECT * FROM `" . $_POST['situation'] . "` WHERE `" . $_POST['situation'] . "`.`login" . $_POST['situation'] . "`='" . $_POST['login'] . "' AND `" . $_POST['situation'] . "`.`mdp" . $_POST['situation'] . "`='" . md5($_POST['mdp']) . "';", $pDatabase);
        if (count($answer) == 1) {
            $user = new $_POST['situation']($answer[0]['login' . $_POST['situation']], $answer[0]['prenom' . $_POST['situation']] . ' ' . $answer[0]['nom' . $_POST['situation']], $answer[0]['mail' . $_POST['situation']], $answer[0]['tel' . $_POST['situation']], $answer[0]['port' . $_POST['situation']]);
            $user = loginWhatUser($user,$pDatabase);
            return $user;
        } else {
            return FALSE;
        }
    }
    function loginWhatUser($pUser, $pDatabase) {
        $userGetClass = get_class($pUser);
        switch ($userGetClass) {
            case "Apprenti":
                $pUser->whoIsMaitreApprentissage($pDatabase);
                $pUser->whoIsTuteurPedagogique($pDatabase);
                $pUser->aboutFormation($pDatabase);
                break;
            case "MaitreApprentissage":
                $pUser->whoIsApprenti($pDatabase);
                $pUser->whoIsTuteurPedagogique($pDatabase);
                $pUser->aboutCompany($pDatabase);
                break;
            case "TuteurPedagogique":
                $pUser->whoIsApprenti($pDatabase);
                $pUser->whoIsMaitreApprentissage($pDatabase);
                break;
        }
        return $pUser;
    }
?>

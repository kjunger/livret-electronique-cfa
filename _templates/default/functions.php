<?php

function dbInit($name, $host, $user, $pwd)
{
    try {
        $database = new PDO('mysql:dbname=' . $name . ';host=' . $host, $user, $pwd);
    }

    catch(PDOException $e) {
        echo $e->getMessage();
    }

    return $database;
}

function userLogout()
{
    unset($_SESSION['login']);
    unset($_SESSION['situation']);

    session_destroy();
    header('Location:index.php');
}

function userName($database, $login, $usrType)
{
    try {
        $query = $database->query("SELECT `$usrType`.`prenom" . $usrType . "`, `$usrType`.`nom" . $usrType . "` from `$usrType` where `$usrType`.`login" . $usrType . "`='$login';");
        $answer = $query->fetchAll();
    }

     catch(PDOException $e) {
        $e->getMessage();
    }

    if (count($answer) == 1){
        echo $answer[0]['prenom' . $usrType] . ' ' . $answer[0]['nom' . $usrType];
    }
}

function subLinks($database, $cat)
{
    try {
        $formLinks = $database->query("select * from FormulaireStandard where catFormulaireStandard='$cat';");
        $answer = $formLinks->fetchAll();
    }

    catch(PDOException $e) {
        $e->getMessage();
    }

    foreach($answer as $row) {
        echo '<li><a href="index.php?cat=' . $row['catFormulaireStandard'] . '&amp;slug=' . $row['slugFormulaireStandard'] . '">' . $row['nomFormulaireStandard'] . '</a></li>';
    }
}

function breadcrumbs($database, $cat, $slug)
{
    switch ($cat) {
        case "form":
            echo 'Formulaires > ';
            break;
    }

    try {
        $formName = $database->query("select nomFormulaireStandard from FormulaireStandard where slugFormulaireStandard='" . $slug . "';");
        $answer = $formName->fetchAll();
    }

    catch(PDOException $e) {
        $e->getMessage();
    }

    if (count($answer) == 1) {
        echo $answer[0]['nomFormulaireStandard'];
    }
}

function controller($database, $slug)
{
    try {
        $form = $database->query("select * from FormulaireStandard where slugFormulaireStandard='" . $slug . "';");
        $answer = $form->fetchAll();
    }

    catch(PDOException $e) {
        $e->getMessage();
    }

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
            try {
                $formation = $database->query("SELECT `Formation`.`intituleFormation` FROM `Formation` INNER JOIN `Apprenti` ON `Formation`.`idFormation`=`Apprenti`.`idFormation` WHERE `Apprenti`.`loginApprenti`='$login';");
                $answer = $formation->fetchAll();
            }

            catch(PDOException $e) {
                $e->getMessage();
            }

            if (count($answer) == 1) {
                echo $answer[0]['intituleFormation'];
            }

            echo "</p><h2>Entreprise</h2><p>";
            try {
                $entreprise = $database->query("SELECT `Entreprise`.`raisonSocialeEntreprise` FROM `Entreprise` INNER JOIN (`MaitreApprentissage` INNER JOIN (`ContratApprentissage` INNER JOIN `Apprenti` ON `ContratApprentissage`.`idApprenti`=`Apprenti`.`idApprenti`) ON `MaitreApprentissage`.`idMaitreApprentissage`=`ContratApprentissage`.`idMaitreApprentissage`) ON `Entreprise`.`idEntreprise`=`MaitreApprentissage`.`idEntreprise` WHERE `Apprenti`.`loginApprenti`='$login';");
                $answer = $entreprise->fetchAll();
            }

            catch(PDOException $e) {
                $e->getMessage();
            }

            if (count($answer) == 1) {
                echo $answer[0]['raisonSocialeEntreprise'];
            }

            echo "</p><h2>Maître d'apprentissage</h2><p>";
            try {
                $maitreApprentissage = $database->query("SELECT `MaitreApprentissage`.`nomMaitreApprentissage`,`MaitreApprentissage`.`prenomMaitreApprentissage`,`MaitreApprentissage`.`fonctionMaitreApprentissage` FROM `MaitreApprentissage` INNER JOIN (`ContratApprentissage` INNER JOIN `Apprenti` ON `ContratApprentissage`.`idApprenti`=`Apprenti`.`idApprenti`) ON `MaitreApprentissage`.`idMaitreApprentissage`=`ContratApprentissage`.`idMaitreApprentissage` WHERE `Apprenti`.`loginApprenti`='$login';");
                $answer = $maitreApprentissage->fetchAll();
            }

            catch(PDOException $e) {
                $e->getMessage();
            }

            if (count($answer) == 1) {
                echo $answer[0]['prenomMaitreApprentissage'] . ' ' . $answer[0]['nomMaitreApprentissage'] . '<br /> ' . $answer[0]['fonctionMaitreApprentissage'];
            }

            echo "</p><h2>Tuteur pédagogique</h2><p>";
            try {
                $tuteurPedagogique = $database->query("SELECT `TuteurPedagogique`.`nomTuteurPedagogique`,`TuteurPedagogique`.`prenomTuteurPedagogique` FROM `TuteurPedagogique` INNER JOIN (`ContratApprentissage` INNER JOIN `Apprenti` ON `ContratApprentissage`.`idApprenti`=`Apprenti`.`idApprenti`) ON `TuteurPedagogique`.`idTuteurPedagogique`=`ContratApprentissage`.`idTuteurPedagogique` WHERE `Apprenti`.`loginApprenti`='$login';");
                $answer = $tuteurPedagogique->fetchAll();
            }

            catch(PDOException $e) {
                echo 'Erreur de transaction : ' . $e->getMessage();
            }

            if (count($answer) == 1) {
                echo $answer[0]['prenomTuteurPedagogique'] . ' ' . $answer[0]['nomTuteurPedagogique'];
            }

            echo "</p>";

            break;

        case "maitreapprentissage":


            break;
    }
}

?>

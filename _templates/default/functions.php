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
    $nbArgs = func_num_args();
    for ($i = 0; $i < $nbArgs; $i++) {
        unset($_SESSION[func_get_arg($i) ]);
    }

    session_destroy();
    header('Location:index.php');
}

function userName($database, $login, $usrType)
{
    switch ($usrType) {
        case "apprenti":
            $name = $database->query("select prenomApprenti, nomApprenti from apprenti where loginApprenti='" . $login . "';");
            $answer = $name->fetchAll();
            if (count($answer) == 1) {
                echo $answer[0]['prenomApprenti'] . ' ' . $answer[0]['nomApprenti'];
            }

            break;

        case "maitreapprentissage":
            $name = $database->query("select prenomMaitreApprentissage, nomMaitreApprentissage from maitreapprentissage where loginMaitreApprentissage='" . $login . "';");
            $answer = $name->fetchAll();
            if (count($answer) == 1) {
                echo $answer[0]['prenomMaitreApprentissage'] . ' ' . $answer[0]['nomMaitreApprentissage'];
            }

            break;

        case "tuteurpedagogique":
            $name = $database->query("select prenomTuteurPedagogique, nomTuteurPedagogique from tuteurpedagogique where loginTuteurPedagogique='" . $login . "';");
            $answer = $name->fetchAll();
            if (count($answer) == 1) {
                echo $answer[0]['prenomTuteurPedagogique'] . ' ' . $answer[0]['nomTuteurPedagogique'];
            }

            break;
    }
}

function subLinks($database, $cat)
{
    try {
        $formLinks = $database->query("select * from formulairestandard where catFormulaireStandard='$cat';");
        $answer = $formLinks->fetchAll();
    }

    catch(PDOException $e) {
        echo 'Erreur de transaction : ' . $e->getMessage();
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
        $formName = $database->query("select nomFormulaireStandard from formulairestandard where slugFormulaireStandard='" . $slug . "';");
        $answer = $formName->fetchAll();
    }

    catch(PDOException $e) {
        echo 'Erreur de transaction : ' . $e->getMessage();
    }

    if (count($answer) == 1) {
        echo $answer[0]['nomFormulaireStandard'];
    }
}

function controller($database,$slug)
{
    try {
        $form = $database->query("select * from formulairestandard where slugFormulaireStandard='" . $slug . "';");
        $answer = $form->fetchAll();
    }

    catch(PDOException $e) {
        echo 'Erreur de transaction : ' . $e->getMessage();
    }

    if (count($answer) == 1) {
        echo $answer[0]['contenuFormulaireStandard'];
    }
    else {
        echo 'La page que vous cherchez à consulter n\'existe pas.';
    }
}

?>

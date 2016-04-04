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

function userLogin($login, $mdp, $usrType, $database)
{
    switch ($usrType) {
        case "apprenti":    // S'il s'agit d'un apprenti
            try {
                $connect = $database->query("select * from apprenti where loginApprenti='" . $login . "' and mdpApprenti='" . md5($mdp) . "';");
                $answer = $connect->fetchAll();
            }

            catch (PDOException $e) {
                echo 'Erreur de transaction : ' . $e->getMessage();
            }

            if (count($answer) == 1) {
                $_SESSION['login'] = $answer[0]['loginApprenti'];
                $_SESSION['situation'] = $usrType;
                header('Location:index.php');
            }
            else {
                header('Location:index.php?error');
            }

            break;

        case "maitreapprentissage":     // S'il s'agit d'un maître d'apprentissage
            try {
                $connect = $database->query("select * from maitreapprentissage where loginMaitreApprentissage='" . $login . "' and mdpMaitreApprentissage='" . md5($mdp) . "';");
                $answer = $connect->fetchAll();
            }

            catch (PDOException $e) {
                echo 'Erreur de transaction : ' . $e->getMessage();
            }

            if (count($answer) == 1) {
                $_SESSION['login'] = $answer[0]['loginMaitreApprentissage'];
                $_SESSION['situation'] = $usrType;
                header('Location:index.php');
            }
            else {
                header('Location:index.php?error');
            }

            break;

        case "tuteurpedagogique":       // S'il s'agit d'un tuteur pédagogique
            try {
                $connect = $database->query("select * from tuteurpedagogique where loginTuteurPedagogique='" . $login . "' and mdpTuteurPedagogique='" . md5($mdp) . "';");
                $answer = $connect->fetchAll();
            }

            catch (PDOException $e) {
                echo 'Erreur de transaction : ' . $e->getMessage();
            }

            if (count($answer) == 1) {
                $_SESSION['login'] = $answer[0]['loginTuteurPedagogique'];
                $_SESSION['situation'] = $usrType;
                header('Location:index.php');
            }
            else {
                header('Location:index.php?error');
            }

            break;
    }
}

?>

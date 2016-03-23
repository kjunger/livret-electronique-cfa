<?php
session_start();
$host='127.0.0.1';
$dbname='portfolio';
$user='root';
$pwd='';
try{
    $db=new PDO("mysql:dbname=$dbname;host=$host",$user,$pwd);
} catch(PDOException $e){
    echo 'Impossible de se connecter à la base de données : '.$e->getMessage();
}
if (isset($_POST['situation'])) {
    if (isset($_POST['login'])) {
        if (isset($_POST['mdp'])) {
            switch ($_POST['situation']) {
                case "apprenti":
                    try {
                        $connect = $db->query("select * from apprenti where loginApprenti='" . $_POST['login'] . "' and mdpApprenti='" . md5($_POST['mdp']) . "';");
                        $answer = $connect->fetchAll();
                    } catch (PDOException $e) {
                        echo 'Erreur de transaction : '.$e->getMessage();
                    }
                    if (count($answer) == 1) {
                        $_SESSION['login'] = $answer[0]['loginApprenti'];
                        $_SESSION['situation'] = $_POST['situation'];
                        header('Location:../index.php');
                    } else {
                        header('Location:../_templates/login.php?error');
                    }
                    break;
                case "maitreapprentissage":
                    try {
                        $connect = $db->query("select * from maitreapprentissage where loginMaitreApprentissage='" . $_POST['login'] . "' and mdpMaitreApprentissage='" . md5($_POST['mdp']) . "';");
                        $answer = $connect->fetchAll();
                    } catch (PDOException $e) {
                        echo 'Erreur de transaction : '.$e->getMessage();
                    }
                    if (count($answer) == 1) {
                        $_SESSION['login'] = $answer[0]['loginMaitreApprentissage'];
                        $_SESSION['situation'] = $_POST['situation'];
                        header('Location:../index.php');
                    } else {
                        header('Location:../_templates/login.php?error');
                    }
                    break;
                case "tuteurpedagogique":
                    try {
                        $connect = $db->query("select * from tuteurpedagogique where loginTuteurPedagogique='" . $_POST['login'] . "' and mdpTuteurPedagogique='" . md5($_POST['mdp']) . "';");
                        $answer = $connect->fetchAll();
                    } catch (PDOException $e) {
                        echo 'Erreur de transaction : '.$e->getMessage();
                    }
                    if (count($answer) == 1) {
                        $_SESSION['login'] = $answer[0]['loginTuteurPedagogique'];
                        $_SESSION['situation'] = $_POST['situation'];
                        header('Location:../index.php');
                    } else {
                        header('Location:../_templates/login.php?error');
                    }
                    break;
            }
        }
    }
}
?>

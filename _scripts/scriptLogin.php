<?php 
    session_start();
    include('../_includes/db_init.php');
    if(isset($_POST['situation'])){
        if(isset($_POST['login'])){
            if(isset($_POST['mdp'])){
                switch ($_POST['situation']){
                    case "apprenti":
                        $connect=$db->query("select * from apprenti where loginApprenti='".$_POST['login']."' and mdpApprenti='".md5($_POST['mdp'])."';");
                        $answer=$connect->fetchAll();
                        if(count($answer)==1){
                            $_SESSION['log']=$answer[0]['loginApprenti'];
                            header('Location:../index.php');
                        }
                        break;
                }
            }
        }
    }
?>
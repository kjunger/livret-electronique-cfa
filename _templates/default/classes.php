<?php

abstract class User
{
    protected $login;
    protected $name;

    abstract public function __construct($pLogin);

    public function getName() {
        return $this->name;
    }

    public function __destruct() {
        unset($_SESSION['login']);
        unset($_SESSION['id']);
        session_destroy();
    }
}

class Apprenti extends User
{
    public function __construct($pLogin, $pMdp, $pDb) {
        try{
            $connect = $pDb->query("select * from apprenti where loginApprenti='$pLogin' and mdpApprenti='" . md5($pMdp) . "';");
            $answer = $connect->fetchAll();
        }

        catch (PDOException $e) {
            echo $e->getMessage();
        }

        if(count($answer)) == 1) {
            $_SESSION['login'] = $answer[0]['loginApprenti'];
            $_SESSION['id'] = $answer[0]['idApprenti'];
        }
    }
}

?>

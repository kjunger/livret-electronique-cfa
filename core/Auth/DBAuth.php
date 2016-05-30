<?php
namespace Core\Auth;
use Core\Database\Database;
class DBAuth {
    private $db;
    public function __construct(Database $db) {
        $this->db = $db;
    }
    public function login($username, $password) {
        $user = $this->db->prepare('SELECT * FROM Utilisateur WHERE login = ?', [$username], null, true);
        if ($user) {
            if ($user->pass === md5($password)) {
                $_SESSION['auth'] = $user->idUtilisateur;
                return true;
            }
        }
    }
    public function logout() {
        $_SESSION = [];
        session_destroy();
        header('Location:login.php');
    }
    public function logged() {
        return isset($_SESSION['auth']);
    }
    public function checkPassword($password) {
        if($this->logged()) {
            $user = $this->db->prepare('SELECT * FROM Utilisateur WHERE idUtilisateur = ?', [$_SESSION['auth']], null, true);
            if($user->pass === md5($password)) {
                return true;
            }
        }
    }
}

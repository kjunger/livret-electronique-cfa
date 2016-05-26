<?php
namespace Core\Auth;
use Core\Database\Database;
class DBAuth {
    private $db;
    public function __construct(Database $db) {
        $this->db = $db;
    }
    public function getUserId() {
        if ($this->logged) {
            return $_SESSION['auth'];
        } else {
            return false;
        }
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
    public function logged() {
        return isset($_SESSION['auth']);
    }
}

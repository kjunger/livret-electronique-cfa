<?php
namespace Core\Auth;
use Core\Database\Database;
class DBAuth {
    private $db;
    /**
     * Constructeur de la class DBAuth
     * @private
     * @param Database Database $db Demande une instance d'une base de données
     */
    public function __construct(Database $db) {
        $this->db = $db;
    }
    /**
     * Méthode login() - pour la connexion d'un utilisateur
     * @param  string  $username
     * @param  string  $password
     * @return boolean True si le mot de passe est vérifié
     */
    public function login($username, $password) {
        $user = $this->db->prepare('SELECT * FROM Utilisateur WHERE login = ?', [$username], null, true);
        if ($user) {
            if ($user->pass === md5($password)) {   //utiliser une méthode de cryptage plus sécurisée
                $_SESSION['auth'] = $user->idUtilisateur;
                return true;
            }
        }
    }
    /**
     * Méthode logout() - pour la déconnexion d'un utilisateur
     */
    public function logout() {
        $_SESSION = [];
        session_destroy();
        header('Location:login.php');
    }
    /**
     * Méthode logged() - pour vérifier s'il y a une session ouverte ou non
     * @return boolean True si une session est ouverte
     */
    public function logged() {
        return isset($_SESSION['auth']);
    }
    /**
     * Méthode checkPassword() - pour vérifier le mot de passe de l'utilisateur s'il est demandé
     * @param  string $password
     * @return boolean  True s'il est vérifié
     */
    public function checkPassword($password) {  //légère redondance avec la partie de vérification du mdp dans login()
        if($this->logged()) {
            $user = $this->db->prepare('SELECT * FROM Utilisateur WHERE idUtilisateur = ?', [$_SESSION['auth']], null, true);
            if($user->pass === md5($password)) {    //utiliser une méthode de cryptage plus sécurisée
                return true;
            }
        }
    }
}

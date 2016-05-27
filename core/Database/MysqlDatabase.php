<?php
namespace Core\Database;
use \PDO;
class MysqlDatabase extends Database {
    private $db_name;
    private $db_user;
    private $db_pass;
    private $db_host;
    private $db_port;
    private $pdo;
    /**
     * Constructeur de la classe générique MysqlDatabase, héritant de la classe Database
     * @private
     * @param string  [$db_name = '']          Nom de la base de données à utiliser (string vide par défaut)
     * @param string  [$db_user = 'root']      Identifiant utilisateur (par défaut, 'root')
     * @param string  [$db_pass = 'root']      Mot de passe utilisateur (par défaut, 'root')
     * @param string  [$db_host = 'localhost'] Adresse du serveur de base de données (par défault, 'localhost' : serveur local)
     * @param integer [$db_port = 3306]        Port à utiliser (par défaut, 3306 - valeur par défaut sur un serveur MySQL)
     */
    public function __construct($db_name = '', $db_user = 'root', $db_pass = 'root', $db_host = 'localhost', $db_port = 3306) {
        $this->db_name = $db_name;
        $this->db_user = $db_user;
        $this->db_pass = $db_pass;
        $this->db_host = $db_host;
        $this->db_port = $db_port;
    }
    /**
     * Méthode getPDO() - Créer (si non existante) et renvoyer une instance de connexion à une base de données
     * @return object PDO Retourne un objet de classe PDO contenant l'instance de connexion
     */
    public function getPDO() {
        if ($this->pdo === null) {
            $pdo = new PDO('mysql:dbname=' . $this->db_name . ';host=' . $this->db_host . ';port=' . $this->db_port, $this->db_user, $this->db_pass);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->pdo = $pdo;
        }
        return $this->pdo;
    }
    /**
     * Méthode query() - Exécuter directement une requête SQL
     * @param  string  $statement            Requête SQL
     * @param  string  [$class_name = null]  Paramètre optionnel - nom de la classe à utiliser pour déterminer sous quel type d'objet renvoyer les résultats (objet de type NomDeLaTableEntity), ou null par défaut
     * @param  boolean [$one = false]        Paramètre optionnel - détermine si un seul résultat est demandé (true) ou non (false, par défaut)
     * @return object PDOStatement $req      Dans le cas d'un requête de type UPDATE ou INSERT ou DELETE, retourne soit un objet PDOStatement, soit false
     * @return object $class_name $data      Par défault, retourne un objet de classe $class_name avec les résultats
     */
    public function query($statement, $class_name = null, $one = false) {
        $req = $this->getPDO()->query($statement);
        if (strpos($statement, 'UPDATE') === 0 || strpos($statement, 'INSERT') === 0 || strpos($statement, 'DELETE') === 0) {
            return $req;
        }
        if (is_null($class_name)) {
            $req->setFetchMode(PDO::FETCH_OBJ);
        } else {
            $req->setFetchMode(PDO::FETCH_CLASS, $class_name);
        }
        if ($one) {
            $data = $req->fetch();
        } else {
            $data = $req->fetchAll();
        }
        return $data;
    }
    /**
     * Méthode prepare() - Préparer et exécuter une requête SQL avec passage d'attributs
     * @param  string   $statement           Requête SQL
     * @param  array    $attributes          Attributs utiles à la requêtes, sous la forme d'un tableau associatif
     * @param  string   [$class_name = null] Paramètre optionnel - nom de la classe à utiliser pour déterminer sous quel type d'objet renvoyer les résultats (objet de type NomDeLaTableEntity), ou null par défaut
     * @param  [[Type]] [$one = false]       Paramètre optionnel - détermine si un seul résultat est demandé (true) ou non (false, par défaut)
     * @return object PDOStatement $req      Dans le cas d'un requête de type UPDATE ou INSERT ou DELETE, retourne soit un objet PDOStatement, soit false
     * @return object $class_name $data      Par défault, retourne un objet de classe $class_name avec les résultats
     */
    public function prepare($statement, $attributes, $class_name = null, $one = false) {
        $req = $this->getPDO()->prepare($statement);
        $res = $req->execute($attributes);
        if (strpos($statement, 'UPDATE') === 0 || strpos($statement, 'INSERT') === 0 || strpos($statement, 'DELETE') === 0) {
            return $res;
        }
        if (is_null($class_name)) {
            $req->setFetchMode(PDO::FETCH_OBJ);
        } else {
            $req->setFetchMode(PDO::FETCH_CLASS, $class_name);
        }
        if ($one) {
            $data = $req->fetch();
        } else {
            $data = $req->fetchAll();
        }
        return $data;
    }
    /**
     * Méthode lastInsertId() - renvoie l'id correspondant à la dernière insertion dans la base de données
     * @return string L'id correspondant à la dernière insertion dans la base de données
     */
    public function lastInsertId() {
        return $this->getPDO()->lastInsertId();
    }
}

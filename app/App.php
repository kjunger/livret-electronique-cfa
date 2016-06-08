<?php
use Core\Config;
use Core\Database\MysqlDatabase;
/**
 * Classe App
 * Classe centrale de l'application
 */
class App {
    private $db_instance;
    private static $_instance;
    /**
     * Méthode getInstance() - pour récupérer une instance de la classe App, à la volée ou non
     * @return object Retourne une instance de l'application sous la forme d'un objet de classe App
     */
    public static function getInstance() {
        if (is_null(self::$_instance)) {
            self::$_instance = new App();
        }
        return self::$_instance;
    }
    /**
     * Méthode load() - chargement de l'application
     */
    public static function load() {
        session_start();
        require ROOT . '/app/Autoloader.php';
        App\Autoloader::register();
        require ROOT . '/core/Autoloader.php';
        Core\Autoloader::register();
    }
    /**
     * Méthode getTable() - pour utiliser une table de la base de données
     * @param  string $name Nom de la table à utiliser
     * @return object Renvoie un objet de classe $class_name (en lui passant une instance pour accéder à la base de données)
     */
    public function getTable($name) {
        $class_name = '\\App\\Table\\' . ucfirst($name) . 'Table';
        return new $class_name($this->getDb());
    }
    /**
     * Méthode getDb() - pour créer et renvoyer une instance de base de données
     * @return object Retourne une instance de base de données (objet de classe MysqlDatabase)
     */
    public function getDb() {
        $config = Config::getInstance(ROOT . '/config/config.php');
        if (is_null($this->db_instance)) {
            $this->db_instance = new MysqlDatabase($config->get('db_name'), $config->get('db_user'), $config->get('db_pass'), $config->get('db_host'), $config->get('db_port'));
        }
        return $this->db_instance;
    }
    /**
     * Méthode forbidden() - gère les erreurs 403
     */
    public static function forbidden() {
        header('HTTP/1.0 403 Forbidden');
        header('Location:403.php');
    }
    /**
     * Méthode notFound() - gère les erreurs 404
     */
    public static function notFound() {
        header('HTTP/1.0 404 Not Found');
        header('Location:404.php');
    }
}

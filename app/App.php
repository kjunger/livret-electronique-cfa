<?php
use Core\Config;
use Core\Database\MysqlDatabase;
class App {
    private $db_instance;
    private static $_instance;
    /**
     * [[Description]]
     * @return [[Type]] [[Description]]
     */
    public static function getInstance() {
        if (is_null(self::$_instance)) {
            self::$_instance = new App();
        }
        return self::$_instance;
    }
    /**
     * [[Description]]
     */
    public static function load() {
        session_start();
        require ROOT . '/app/Autoloader.php';
        App\Autoloader::register();
        require ROOT . '/core/Autoloader.php';
        Core\Autoloader::register();
    }
    /**
     * [[Description]]
     * @param  [[Type]] $name [[Description]]
     * @return [[Type]] [[Description]]
     */
    public function getTable($name) {
        $class_name = '\\App\\Table\\' . ucfirst($name) . 'Table';
        return new $class_name($this->getDb());
    }
    /**
     * [[Description]]
     * @return [[Type]] [[Description]]
     */
    public function getDb() {
        $config = Config::getInstance(ROOT . '/config/config.php');
        if (is_null($this->db_instance)) {
            $this->db_instance = new MysqlDatabase($config->get('db_name'), $config->get('db_user'), $config->get('db_pass'), $config->get('db_host'), $config->get('db_port'));
        }
        return $this->db_instance;
    }
    /**
     * [[Description]]
     */
    public static function forbidden() {
        header('HTTP/1.0 403 Forbidden');
        header('Location:403.php');
    }
    /**
     * [[Description]]
     */
    public static function notFound() {
        header('HTTP/1.0 404 Not Found');
header('Location:404.php');
    }
}

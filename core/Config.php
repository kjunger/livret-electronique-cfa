<?php
namespace Core;
class Config {
    private $settings = array();
    private static $_instance;
    /**
     * méthode getInstance() - pour récupérer une instance de la classe Config, à la volée ou non
     * @param string $file Nom du fichier de configuration (plus le chemin y menant, le cas échéant) à récupérer
     * @return object Retourne une instance de l'application sous la forme d'un objet de classe Config
     */
    public static function getInstance($file) {
        if (is_null(self::$_instance)) {
            self::$_instance = new Config($file);
        }
        return self::$_instance;
    }
    /**
     * Constructeur de la classe Config
     * @private string $file Nom du fichier de configuration (plus le chemin y menant, le cas échéant) à récupérer
     * @param string $file 
     */
    public function __construct($file) {
        $this->settings = require $file;
    }
    /**
     * Méthode get() - Pour récupérer une valeur du tableau stocké dans le fichier de configuration
     * @param  string $key 
     * @return Le contenu de la clé demandée (integer ou string)
     */
    public function get($key) {
        if (!isset($this->settings[$key])) {
            return null;
        }
        return $this->settings[$key];
    }
}

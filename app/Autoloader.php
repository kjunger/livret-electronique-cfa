<?php
namespace App;
class Autoloader {
    /**
     * Méthode register - gère le chargement automatique des classes lors de leur appel - utilise la méthode autoload()
     */
    static function register() {
        spl_autoload_register(array(
            __CLASS__,
            'autoload'
        ));
    }
    /**
     * Méthode autoload - parseur de classes
     * @param string $class Nom de la classe avec les namespaces - ex : \Core\Table\Table
     */
    static function autoload($class) {
        if (strpos($class, __NAMESPACE__ . '\\') === 0) {
            $class = str_replace(__NAMESPACE__ . '\\', '', $class);
            $class = str_replace('\\', '/', $class);
            require $class . '.php';
        }
    }
}

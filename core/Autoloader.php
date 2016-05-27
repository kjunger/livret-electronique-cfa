<?php
namespace Core;
class Autoloader {
    /**
     * [[Description]]
     */
    static function register() {
        spl_autoload_register(array(
            __CLASS__,
            'autoload'
        ));
    }
    /**
     * [[Description]]
     * @param [[Type]] $class [[Description]]
     */
    static function autoload($class) {
        if (strpos($class, __NAMESPACE__ . '\\') === 0) {
            $class = str_replace(__NAMESPACE__ . '\\', '', $class);
            $class = str_replace('\\', '/', $class);
            require $class . '.php';
        }
    }
}

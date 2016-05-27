<?php
namespace Core;
class Config {
    private $settings = array();
    private static $_instance;
    /**
     * [[Description]]
     * @param  [[Type]] $file [[Description]]
     * @return [[Type]] [[Description]]
     */
    public static function getInstance($file) {
        if (is_null(self::$_instance)) {
            self::$_instance = new Config($file);
        }
        return self::$_instance;
    }
    /**
     * [[Description]]
     * @private
     * @param [[Type]] $file [[Description]]
     */
    public function __construct($file) {
        $this->settings = require $file;
    }
    /**
     * [[Description]]
     * @param  [[Type]] $key [[Description]]
     * @return [[Type]] [[Description]]
     */
    public function get($key) {
        if (!isset($this->settings[$key])) {
            return null;
        }
        return $this->settings[$key];
    }
}

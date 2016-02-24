<?php
/**
 * Created by PhpStorm.
 * User: KOH
 * Date: 16/2/24
 * Time: 下午11:26
 */

namespace Superkoh\Core;


class Singleton {
    private static $instanceStack = [];

    protected function __construct() {
    }

    /**
     * @return $this
     */
    final public static function getInstance() {
        $class = get_called_class();
        if (!isset(self::$instanceStack[$class])) {
            self::$instanceStack[$class] = new $class();
        }
        return self::$instanceStack[$class];
    }

    final private function __clone() {
    }
}
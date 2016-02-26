<?php
/**
 * Created by PhpStorm.
 * User: KOH
 * Date: 16/2/26
 * Time: 上午12:27
 */

namespace Superkoh\Traits;


trait Singleton
{
    private static $instance;

    /**
     * @return $this
     */
    final public static function getInstance()
    {
        if (!isset(self::$instance)) {
            $class = get_called_class();
            self::$instance = new $class();
            if (method_exists(self::$instance, '_init')) {
                call_user_func_array([self::$instance, '_init'], []);
            }
        }
        return self::$instance;
    }
}
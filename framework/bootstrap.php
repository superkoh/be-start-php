<?php
/**
 * Created by PhpStorm.
 * User: KOH
 * Date: 16/2/24
 * Time: 下午6:05
 */

use Superkoh\Core\SK;

// register autoload
spl_autoload_register(function ($class) {
    if (strpos($class, 'Superkoh\\') === 0) {
        @include __DIR__ . '/' . str_replace('\\', '/', substr($class, 9)) . '.php';
    } elseif (strpos($class, 'App\\') === 0) {
        @include APP_ROOT . '/' . str_replace('\\', '/', substr($class, 4)) . '.php';
    } else {
        @include $class . '.php';
    }
});

include __DIR__ . '/../vendor/autoload.php';

define('APP_ROOT', __DIR__ . '/../application');
$config = include APP_ROOT . '/configs/app.config.php';

// setting error reporting level
if (!empty($config['errorReporting'])) {
    error_reporting($config['errorReporting']);
} else {
    error_reporting(E_ALL);
}

// setting time zone
if (!empty($config['dateDefaultTimezone'])) {
    date_default_timezone_set($config['dateDefaultTimezone']);
}

// setting php include path
//set_include_path(get_include_path()
//    . PATH_SEPARATOR . __DIR__
//    . PATH_SEPARATOR . APP_ROOT . '/controllers'
//    . PATH_SEPARATOR . APP_ROOT . '/actions'
//    . PATH_SEPARATOR . APP_ROOT . '/models'
//    . PATH_SEPARATOR . APP_ROOT . '/components'
//);
//if (!empty($config['phpIncludePath'])) {
//    set_include_path(get_include_path() . PATH_SEPARATOR
//        . implode(PATH_SEPARATOR, $config['phpIncludePath'])
//    );
//}

register_shutdown_function(function(){
    $error = error_get_last();
    if (empty($error)) return;
    $ignore = E_WARNING | E_NOTICE | E_USER_WARNING | E_USER_NOTICE | E_STRICT | E_DEPRECATED | E_USER_DEPRECATED;
    if (($error['type'] & $ignore) == 0) {
        // TODO:
        SK::logger('err')->error(print_r($error, true));
        die;
    }
});

set_exception_handler(function($e){
    // TODO:
    SK::logger('err')->error(print_r($e, true));
});

return $config;
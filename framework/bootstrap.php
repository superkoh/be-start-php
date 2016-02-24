<?php
/**
 * Created by PhpStorm.
 * User: KOH
 * Date: 16/2/24
 * Time: 下午6:05
 */

define('APP_ROOT', __DIR__ . '/../application');
$config = include APP_ROOT . '/configs/app.config.php';

// setting php include path
set_include_path(get_include_path()
    . PATH_SEPARATOR . __DIR__
    . PATH_SEPARATOR . APP_ROOT . '/controllers'
    . PATH_SEPARATOR . APP_ROOT . '/actions'
    . PATH_SEPARATOR . APP_ROOT . '/models'
    . PATH_SEPARATOR . APP_ROOT . '/components'
);
if (!empty($config['phpIncludePath'])) {
    set_include_path(get_include_path() . PATH_SEPARATOR
        . implode(PATH_SEPARATOR, $config['phpIncludePath'])
    );
}

// setting time zone
if (!empty($config['dateDefaultTimezone']))
    date_default_timezone_set($config['dateDefaultTimezone']);

// register autoload
spl_autoload_register(function ($class) use ($config) {
    if (strpos($class, 'Superkoh\\') === 0)
        @include __DIR__ . '/' . str_replace('\\', '/', substr($class, 9)) . '.php';
    elseif (!empty($config['namespaceMapping'])) {
        foreach ($config['namespaceMapping'] as $prefix => $folder)
            if (strpos($class, $prefix) === 0)
                @include APP_ROOT . $folder . '/' . str_replace('\\', '/', substr($class, strlen($prefix))) . '.php';
    } else
        @include $class . '.php';
});

return $config;
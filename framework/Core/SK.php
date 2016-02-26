<?php
/**
 * Created by PhpStorm.
 * User: KOH
 * Date: 16/2/24
 * Time: 下午11:24
 */

namespace Superkoh\Core;

use Monolog\Logger;

class SK
{

    /**
     * @var WebApplication
     */
    private static $app;

    /**
     * @var Logger[]
     */
    private static $logContainer = [];

    /**
     * @var array
     */
    private static $logConfig;

    /**
     * @param array|null $config
     * @return WebApplication
     */
    public static function app(array $config = null)
    {
        if (!isset(self::$app)) {
            if (!isset($config)) {
                throw new \InvalidArgumentException('$config can not be null');
            }
            self::$app = new WebApplication($config);
        }
        if (isset($config)) {
            self::$app->setConfig($config);
        }
        return self::$app;
    }

    /**
     * @param string $key
     * @return Logger
     */
    public static function log(string $key = 'default')
    {
        if (!isset(self::$logConfig)) {
            self::$logConfig = include APP_ROOT . '/configs/log.config.php';
        }
        if (!isset(self::$logContainer[$key])) {
            if (empty(self::$logConfig[$key])) {
                throw new \InvalidArgumentException('config for ' . $key . ' can not be found');
            }
            self::$logContainer[$key] = new Logger($key);
            $ref = new \ReflectionClass('\\Monolog\\Handler\\' . self::$logConfig[$key]['handler']);
            $handler = $ref->newInstanceArgs(self::$logConfig[$key]['settings']);
            self::$logContainer[$key]->pushHandler($handler);
        }
        return self::$logContainer[$key];
    }

}
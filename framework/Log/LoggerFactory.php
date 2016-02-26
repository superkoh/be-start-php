<?php
/**
 * Created by PhpStorm.
 * User: KOH
 * Date: 16/2/26
 * Time: 下午10:54
 */

namespace Superkoh\Log;


use Monolog\Logger;
use Superkoh\Core\ComponentFactory;

class LoggerFactory extends ComponentFactory
{

    /**
     * @param string $key
     * @param array $settings
     * @return Logger
     */
    public static function create(string $key, array $settings)
    {
        $logger = new Logger($key);
        $ref = new \ReflectionClass('\\Monolog\\Handler\\' . $settings['handler']);
        $handler = $ref->newInstanceArgs($settings['params']);
        $logger->pushHandler($handler);
        return $logger;
    }
}
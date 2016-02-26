<?php
/**
 * Created by PhpStorm.
 * User: KOH
 * Date: 16/2/24
 * Time: 下午11:24
 */

namespace Superkoh\Core;


class SK
{

    /**
     * @var WebApplication
     */
    private static $app;

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

}
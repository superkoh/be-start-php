<?php
/**
 * Created by PhpStorm.
 * User: KOH
 * Date: 16/2/24
 * Time: 下午11:24
 */

namespace Superkoh\Core;

use Psr\Http\Message\ServerRequestInterface;
use Psr\Log\LoggerInterface;

class SK
{

    /**
     * @return WebApplication
     */
    public static function app()
    {
        return WebApplication::getInstance();
    }

    /**
     * @param string $key
     * @return LoggerInterface
     */
    public static function logger(string $key = 'default')
    {
        return SK::app()->getComponent('logger.' . $key);
    }

    /**
     * @return ServerRequestInterface
     */
    public static function request()
    {
        return SK::app()->getRequest();
    }

}
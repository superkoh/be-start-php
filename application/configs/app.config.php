<?php
/**
 * Created by PhpStorm.
 * User: KOH
 * Date: 16/2/24
 * Time: 下午6:14
 */

use Monolog\Logger;

return [
    // include path for php file
    'phpIncludePath' => [],

    // date default timezone
    'dateDefaultTimezone' => 'Asia/Shanghai',

    // namespace mapping for php under application folder
    'namespaceMapping' => [
        'App\\Controller\\' => '/controllers'
    ],

    // error_reporting level
    'errorReporting' => E_ALL,

    'components' => [
        'logger.default' => [
            'class' => \Superkoh\Log\LoggerFactory::class,
            'settings' => [
                'handler' => 'RotatingFileHandler',
                'params' => [
                    'filename' => APP_ROOT . '/logs/default.log',
                    'maxFiles' => 30,
                    'level' => Logger::DEBUG
                ]
            ]
        ],
        'logger.err' => [
            'class' => \Superkoh\Log\LoggerFactory::class,
            'settings' => [
                'handler' => 'RotatingFileHandler',
                'params' => [
                    'filename' => APP_ROOT . '/logs/err.log',
                    'maxFiles' => 30,
                    'level' => Logger::DEBUG
                ]
            ]
        ],
    ]

];
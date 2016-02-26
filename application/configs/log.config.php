<?php
/**
 * Created by PhpStorm.
 * User: KOH
 * Date: 16/2/26
 * Time: 上午11:16
 */

//const DEBUG = 100;
//const INFO = 200;
//const NOTICE = 250;
//const WARNING = 300;
//const ERROR = 400;
//const CRITICAL = 500;
//const ALERT = 550;
//const EMERGENCY = 600;

return [
    // log
    'default' => [
        'handler' => 'RotatingFileHandler',
        'settings' => [
            //$filename, $maxFiles = 0, $level = Logger::DEBUG, $bubble = true, $filePermission = null, $useLocking = false
            'filename' => APP_ROOT . '/logs/default.log',
            'maxFiles' => 30,
            'level' => 100
        ]
    ],
    'err' => [
        'handler' => 'RotatingFileHandler',
        'settings' => [
            //$filename, $maxFiles = 0, $level = Logger::DEBUG, $bubble = true, $filePermission = null, $useLocking = false
            'filename' => APP_ROOT . '/logs/err.log',
            'maxFiles' => 30,
            'level' => 100,
        ]
    ]
];
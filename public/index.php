<?php
/**
 * Created by PhpStorm.
 * User: KOH
 * Date: 16/2/24
 * Time: 下午6:05
 */
use Superkoh\Core\SK;

$config = include '../framework/bootstrap.php';
SK::app($config)->run();
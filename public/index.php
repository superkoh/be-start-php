<?php
/**
 * Created by PhpStorm.
 * User: KOH
 * Date: 16/2/24
 * Time: 下午6:05
 */
use Superkoh\Core\WebApplication;

$config = include '../framework/bootstrap.php';
$app = new WebApplication($config);
$app->run();
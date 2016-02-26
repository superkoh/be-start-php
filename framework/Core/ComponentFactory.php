<?php
/**
 * Created by PhpStorm.
 * User: KOH
 * Date: 16/2/26
 * Time: 下午10:54
 */

namespace Superkoh\Core;


abstract class ComponentFactory
{
    abstract public static function create(string $key, array $settings);
}
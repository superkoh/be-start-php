<?php
/**
 * Created by PhpStorm.
 * User: KOH
 * Date: 16/2/24
 * Time: 下午6:59
 */

namespace Superkoh\Core;


abstract class Application
{

    /**
     * Application config
     * @var array
     */
    private $config;

    abstract public function run();

    abstract public function stop();

    public function getConfig():array
    {
        return $this->config;
    }

    /**
     * @param array $config
     */
    public function setConfig(array $config)
    {
        $this->config = $config;
    }
}
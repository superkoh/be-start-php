<?php
/**
 * Created by PhpStorm.
 * User: KOH
 * Date: 16/2/24
 * Time: 下午6:59
 */

namespace Superkoh\Core;


abstract class Application extends Singleton {

    /**
     * Application config
     * @var array
     */
    private $config;

    abstract public function run();

    abstract public function stop();

    /**
     * @param array $config
     * @return $this
     */
    public function setConfig(array $config) {
        $this->config = $config;
        return $this;
    }

    public function getConfig():array {
        return $this->config;
    }
}
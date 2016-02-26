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

    /**
     * @var array
     */
    private $components = [];

    public function __construct(array $config)
    {
        $this->config = $config;
    }

    abstract public function run();

    abstract public function stop();

    public function getConfig():array
    {
        return $this->config;
    }

    /**
     * @param $key
     * @return mixed
     */
    public function getComponent($key)
    {
        if (!isset($this->components[$key])) {
            if (empty($this->config['components']) || empty($this->config['components'][$key])) {
                throw new \InvalidArgumentException('components ' . $key . ' not found');
            }
            $ref = new \ReflectionClass($this->config['components'][$key]['class']);
            /** @var ComponentFactory $factory */
            $factory = $ref->newInstanceWithoutConstructor();
            $this->components[$key] = $factory->create($key, $this->config['components'][$key]['settings']);
        }
        return $this->components[$key];
    }

}
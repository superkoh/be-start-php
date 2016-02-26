<?php
/**
 * Created by PhpStorm.
 * User: KOH
 * Date: 16/2/24
 * Time: 下午7:02
 */

namespace Superkoh\Core;


use Superkoh\Traits\Singleton;
use Zend\Diactoros\Request;
use Zend\Diactoros\ServerRequestFactory;

class WebApplication extends Application
{
    use Singleton;

    /**
     * @var Request
     */
    private $request;

    public function __construct(array $config)
    {
        $this->setConfig($config);
        $this->request = ServerRequestFactory::fromGlobals();
    }

    public function run()
    {
        //echo phpinfo();
        // TODO: Implement run() method.
        print_r($this->request->getHeader('User-Agent'));
        //echo $_SERVER['REQUEST_URI'];
        //echo phpinfo();
    }

    public function stop()
    {
        // TODO: Implement stop() method.
    }
}
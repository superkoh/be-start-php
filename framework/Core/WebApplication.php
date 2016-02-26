<?php
/**
 * Created by PhpStorm.
 * User: KOH
 * Date: 16/2/24
 * Time: 下午7:02
 */

namespace Superkoh\Core;


use Psr\Http\Message\ServerRequestInterface;
use Zend\Diactoros\Request;
use Zend\Diactoros\ServerRequestFactory;

class WebApplication extends Application
{
    /**
     * @var WebApplication
     */
    private static $instance;


    /**
     * @var ServerRequestInterface
     */
    private $request;


    /**
     * @return WebApplication
     */
    public static function getInstance()
    {
        return self::$instance;
    }

    /**
     * WebApplication constructor.
     * @param array $config
     */
    public function __construct(array $config)
    {
        if (isset(self::$instance)) {
            throw new \RuntimeException("application is already running");
        }
        parent::__construct($config);
        $this->request = ServerRequestFactory::fromGlobals();
        self::$instance = $this;
    }

    /**
     * @return ServerRequestInterface
     */
    public function getRequest()
    {
        return $this->request;
    }

    public function run()
    {
        //echo phpinfo();
        // TODO: Implement run() method.
        print_r($this->request->getHeader('User-Agent'));
        SK::logger()->info($this->request->getHeaderLine('User-Agent'));
        //echo $_SERVER['REQUEST_URI'];
        //echo phpinfo();
    }

    public function stop()
    {
        // TODO: Implement stop() method.
    }


}
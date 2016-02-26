<?php
/**
 * Created by PhpStorm.
 * User: KOH
 * Date: 16/2/26
 * Time: 下午5:01
 */

namespace Superkoh\Routing;


use Psr\Http\Message\RequestInterface;

abstract class AbstractRouter
{

    final public function __construct(RequestInterface $request)
    {
    }

    abstract protected function getRequestHandler();

    final public function dispatch()
    {

    }
}
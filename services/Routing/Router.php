<?php
/**
 * Created by PhpStorm.
 * User: nicol
 * Date: 27/11/2017
 * Time: 11:24
 */

namespace services\Routing;


class Router implements RouterInterface
{
    /**
     * @var RouteCollection
     */
    private $routes;

    private $router;

    public function getServiceName()
    {
        return self::class;
    }

    public function parseUrl($url)
    {
        // TODO: Implement parseUrl() method.
    }

    public function redirect($route)
    {
        // TODO: Implement redirect() method.
    }

}
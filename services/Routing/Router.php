<?php
/**
 * Created by PhpStorm.
 * User: nicol
 * Date: 27/11/2017
 * Time: 11:24
 */

namespace services\Routing;


use services\kernel\ControllerInterface;

class Router implements RouterInterface
{
    /**
     * @var RouteCollection
     */
    private $routes;

    /**
     * Router constructor.
     */
    public function __construct()
    {
        $this->routes = new RouteCollection();
    }


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

    public function initialise($controllersArray)
    {
        foreach($controllersArray as $controller){
            $this->routes->addRoute($controller->getRoutes());
        }
    }


}
<?php
/**
 * Created by PhpStorm.
 * User: nicol
 * Date: 27/11/2017
 * Time: 11:14
 */

namespace services\Routing;


class RouteCollection
{
    /**
     * @var Route[]
     */
    private $routes = array();

    /**
     * @param Route|RouteCollection $route
     * @return \LogicException|$this
     */
    public function addRoute($route)
    {
        try {
            foreach ($route as $addingRoute) {
                if ($addingRoute instanceof RouteCollection) $this->addRoute($addingRoute);
                else $this->addOneRoute($addingRoute);
            }
        }
        catch(\LogicException $e) {
            return $e;
        }
        return $this;
    }

    /**
     * @param $name
     * @return \LogicException|Route
     */
    public function getRoute($name){
        return array_key_exists($name, $this->routes) ? $this->routes[$name] : new \LogicException(sprintf("Unknowed %s route", $name));
    }


    /**
     * @param Route $route
     * @return $this|\LogicException
     */
    private function addOneRoute(Route $route){
        if(array_key_exists($route->getName(), $this->routes)) throw new \LogicException(sprintf("Route with name %s already exists", $route->getName()));

        $this->routes[$route->getName()]=$route;
    }
}
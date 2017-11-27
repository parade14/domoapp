<?php
/**
 * Created by PhpStorm.
 * User: nicol
 * Date: 27/11/2017
 * Time: 11:24
 */

namespace services\Routing;


use Services\ServiceHandler\ServiceInterface;

interface RouterInterface extends ServiceInterface
{
    /**
     * @param $url string
     * @return Route
     */
    public function parseUrl($url);

    /**
     * @param $route
     * @return true|\LogicException
     */
    public function redirect($route);
}
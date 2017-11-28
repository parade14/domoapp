<?php
/**
 * Created by PhpStorm.
 * User: nicol
 * Date: 28/11/2017
 * Time: 08:57
 */

namespace services\controller;


use services\Routing\Route;
use services\Routing\RouteCollection;

interface ControllerInterface
{
    /**
     * @return RouteCollection|Route
     */
    public function getRoutes();
}
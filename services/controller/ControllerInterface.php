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
use Services\ServiceHandler\ServiceInterface;

interface ControllerInterface
{
    /**
     * @return RouteCollection|Route
     */
    public function getRoutes();

    /**
     * @throws \LogicException
     * @return ServiceInterface
     */
    public function getService();
}
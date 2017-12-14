<?php
/**
 * Created by PhpStorm.
 * User: nicol
 * Date: 20/11/2017
 * Time: 09:28
 */

namespace Kernel\ServiceHandler;


interface ServiceHandlerInterface extends ServiceInterface
{

    /**
     * @param $service
     * @return ServiceHandlerInterface
     */
    public function addService($service);

    /**
     * @param $serviceName string
     * @return ServiceInterface
     * @throws \LogicException
     */
    public function get($serviceName);

    /**
     * @param $serviceName string
     * @return boolean
     */
    public function hasService($serviceName);
}
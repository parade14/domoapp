<?php
/**
 * Created by PhpStorm.
 * User: nicol
 * Date: 20/11/2017
 * Time: 09:28
 */

namespace domoapp\services\handler;


interface ServiceHandlerInterface extends ServiceInterface
{

    /**
     * @param $service ServiceInterface
     * @return ServiceHandlerInterface
     */
    public function addService(ServiceInterface $service);

    /**
     * @param $serviceName string
     * @return ServiceInterface
     */
    public function getService($serviceName);

    /**
     * @param $serviceName string
     * @return boolean
     */
    public function hasService($serviceName);
}
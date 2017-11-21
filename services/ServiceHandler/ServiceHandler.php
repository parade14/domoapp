<?php
/**
 * Created by PhpStorm.
 * User: nicol
 * Date: 20/11/2017
 * Time: 09:26
 */

namespace domoapp\services\ServiceHandler;


class ServiceHandler implements ServiceHandlerInterface
{
    /**
     * @var array
     */
    protected $servicesCollection = array();




    public function addService(ServiceInterface $service)
    {
        array_key_exists($service->getServiceName(), $this->servicesCollection) ? :
            $this->servicesCollection[$service->getServiceName()] = $service;
        return $this;
    }

    public function getService($serviceName)
    {
        return array_key_exists($serviceName, $this->servicesCollection) ? $this->servicesCollection[$serviceName] : new \LogicException("unknow sevice $serviceName");
    }

    public function hasService($serviceName)
    {
        return array_key_exists($serviceName, $this->servicesCollection) ? true : false ;

    }

    public function getServiceName()
    {
       return self::class;
    }

}
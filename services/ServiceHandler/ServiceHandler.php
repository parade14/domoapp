<?php
/**
 * Created by PhpStorm.
 * User: nicol
 * Date: 20/11/2017
 * Time: 09:26
 */

namespace Services\ServiceHandler;


class ServiceHandler implements ServiceHandlerInterface
{
    /**
     * @var array
     */
    protected $servicesReferenced = array();
    protected $loading = array();




    public function addService(ServiceInterface $service)
    {
        array_key_exists($service->getServiceName(), $this->servicesReferenced) ? :
            $this->servicesReferenced[$service->getServiceName()] = $service;
        return $this;
    }

    public function getService($serviceName)
    {
        if(array_key_exists($serviceName, $this->servicesReferenced)) return $this->servicesReferenced[$serviceName] ;
        Throw new \LogicException("unknow sevice $serviceName");
    }

    public function hasService($serviceName)
    {
        return array_key_exists($serviceName, $this->servicesReferenced) ? true : false ;

    }

    public function getServiceName()
    {
       return self::class;
    }

}
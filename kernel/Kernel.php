<?php
/**
 * Created by PhpStorm.
 * User: nicol
 * Date: 27/11/2017
 * Time: 11:59
 */

namespace kernel;

use Kernel\ServiceHandler\ServiceHandler;
use Kernel\ServiceHandler\ServiceInterface;
use services\accomodation\AccommodationService;
use Services\Database\DatabaseObject;
use Services\Database\DatabaseService;
use Services\DataSensor\DataSensorService;

final class Kernel
{
    protected $serviceHandler;

    public function __construct()
    {
        $this->serviceHandler = new ServiceHandler();
        $this->serviceHandler
            ->addService(AccommodationService::class)
            ->addService(DatabaseService::class)
            ->addService(DataSensorService::class)
            ->addService(DatabaseObject::class)
        ;
    }


    /**
     * @param string $serviceName
     * @return ServiceInterface|mixed
     * @throws \Exception
     */
    public function get($serviceName)
    {
        return $this->serviceHandler->get($serviceName);
    }
}
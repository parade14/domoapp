<?php
/**
 * Created by PhpStorm.
 * User: nicol
 * Date: 27/11/2017
 * Time: 11:59
 */

namespace kernel;

use controllers\AccueilController;
use Kernel\ServiceHandler\ServiceHandler;
use Kernel\ServiceHandler\ServiceInterface;
use Services\Accomodation\AccommodationService;
use Services\Database\DatabaseObject;
use Services\Database\DatabaseService;
use Services\Datasensor\DataSensorService;
use Services\Room\RoomService;
use Services\Security\AccessGranter;
use Services\Security\RolesManager;
use Services\Sensor\SensorService;
use Services\Session\SessionManager;
use services\templates\TemplateService;
use Services\User\UserService;

final class Kernel implements ServiceInterface
{
    protected $serviceHandler;

    public function __construct()
    {
        $this->serviceHandler = new ServiceHandler($this);
        /**
         * Adding services
         */
        $this->serviceHandler
            ->addService(AccommodationService::class)
            ->addService(DatabaseService::class)
            ->addService(DataSensorService::class)
            ->addService(DatabaseObject::class)
            ->addService(RoomService::class)
            ->addService(SensorService::class)
            ->addService(UserService::class)
            ->addService(RolesManager::class)
            ->addService(AccessGranter::class)
            ->addService(SessionManager::class)
            ->addService(TemplateService::class)
        ;

        /**
         * Adding controllers
         */
        $this->serviceHandler
            ->addService(AccueilController::class)
        ;
    }


    /**
     * @param string $serviceName
     * @return ServiceInterface|mixed
     * @throws \Exception
     */
    public function get($serviceName)
    {
        return ($serviceName == "kernel") ? $this : $this->serviceHandler->get($serviceName);
    }

    public static function getName()
    {
        return "kernel";
    }
}
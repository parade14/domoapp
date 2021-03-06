<?php
/**
 * Created by PhpStorm.
 * User: nicol
 * Date: 27/11/2017
 * Time: 11:59
 */

namespace kernel;

use controllers\AccueilController;
use controllers\ModifProfilController;
use controllers\UserController;
use controllers\CapteursController;
use controllers\ServiceClientController;
use controllers\AccommodationController;
use controllers\GroupController;
use controllers\DeconnectController;
use controllers\StatistiqueController;
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
use services\group\GroupService;
use Services\User\UserService;

final class Kernel implements ServiceInterface
{
    protected $serviceHandler;

    /**
     * Kernel constructor.
     */
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
            ->addService(GroupService::class)
        ;

        /**
         * Adding controllers
         */
        $this->serviceHandler
            ->addService(AccueilController::class)
            ->addService(UserController::class)
            ->addService(AccommodationController::class)
            ->addService(ModifProfilController::class)
            ->addService(CapteursController::class)
            ->addService(ServiceClientController::class)
            ->addService(GroupController::class)
            ->addService(DeconnectController::class)
            ->addService(StatistiqueController::class)
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

    /**
     * @return string
     */
    public static function getName()
    {
        return "kernel";
    }
}
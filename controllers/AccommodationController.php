<?php

namespace controllers;

use Entities\Accommodation;
use kernel\Kernel;
use Kernel\ServiceHandler\ServiceInterface;
use Services\HttpFoundation\AccessDeniedException;


class AccommodationController extends BaseController
{
    public static function getName(){
        return "accommodation.controller";
    }

    /**
     * @return mixed
     * @throws \Exception
     */
    public function index(){
        $kernel = new \kernel\Kernel();

        //$dataBase = new DatabaseObject('domoapp', '' , 'localhost', 'root');
        $dataBase = $kernel->get("database.object");
        $databaseService = $kernel->get("database.service");
        $accommodationService = $kernel->get("accommodation.service");
        $sessionService = $kernel->get("session.manager");
        $roomService = $kernel->get("room.service");
        $accommodationService->setServiceConnect($databaseService);
        $accommodationService->setDataBaseObject($dataBase);
        $databaseService->connect($dataBase);
        $accomodations = $accommodationService->getAccommodationByUserId(1);
       

        //$var = $this->get('access.granter')->isGranted("AUTHENTICATED_USER");
        //if($var)
            return $this->get("template.service")->parse("appartements/modifierAppartement.php", array("user"=>$this->get('session.manager')->getCurrentUser(), "accomodations" =>$accomodations, "roomService" => $roomService));

        //throw new AccessDeniedException();
    }
}


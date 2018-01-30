<?php

namespace controllers;

use kernel\Kernel;
use Kernel\ServiceHandler\ServiceInterface;
use Services\HttpFoundation\AccessDeniedException;
use Entities\User;


class CapteursController extends BaseController
{
    public static function getName(){
        return "capteurs.controller";
    }

    /**
     * @return mixed
     * @throws \Exception
     */
    public function index(){
        
        $kernel = $this->kernel;

        $dataBase = $kernel->get("database.object");
        $databaseService = $kernel->get("database.service");
        $databaseService->connect($dataBase);
        
        $sessionService = $kernel->get("session.manager");
        
        $accommodationService = $kernel->get("accommodation.service");
        $accommodationService->setServiceConnect($databaseService);
        $accommodationService->setDataBaseObject($dataBase);
        
        
        $capteurService = $kernel->get("sensor.service");
        $capteurService->setServiceConnect($databaseService);
        $capteurService->setDataBaseObject($dataBase);
        
        $roomService = $kernel->get("room.service");
        $roomService->setServiceConnect($databaseService);
        $roomService->setDataBaseObject($dataBase);
        
        $accommodations = $accommodationService->getAccommodationByUserId($this->get('session.manager')->getCurrentUser()->getId());
        
        $rooms = [];
        $sensors = [];
        
        if(isset($_GET['idAcc'])){
            $rooms = $roomService->getRoomBy("accommodation_id", $_GET['idAcc']);
        }
        $var = $this->get('access.granter')->isGranted("AUTHENTICATED_USER");
        if($var){
            return $this->get("template.service")->parse("capteur/capteur.php", array("user"=>$this->get('session.manager')->getCurrentUser(), "accommodations" => $accommodations, "rooms" => $rooms));
        } else {
            throw new AccessDeniedException();
        }
    }
}
<?php

namespace controllers;
use Entities\User;
use kernel\Kernel;
use Kernel\ServiceHandler\ServiceInterface;
use Services\HttpFoundation\AccessDeniedException;

class ServiceClientController extends BaseController
{
    public static function getName(){
        return "serviceClient.controller";
    }
    /**
     * @return mixed
     * @throws \Exception
     */
    public function index(){


        //$dataBase = new DatabaseObject('domoapp', '' , 'localhost', 'root');
        $dataBase = $this->get("database.object");
        $databaseService = $this->get("database.service");
        $sessionService = $this->get("session.manager");
        $databaseService->connect($dataBase);

        $var = $this->get('access.granter')->isGranted("AUTHENTICATED_USER");
        if($var && $this->get('session.manager')->getCurrentUser()->getProfileType()==2){
            return $this->get("template.service")->parse("serviceClient/accueilServiceClient.php", array());
        }else{
            throw new AccessDeniedException();
        }
    }
}

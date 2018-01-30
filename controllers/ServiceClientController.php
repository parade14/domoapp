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
        $kernel = new \kernel\Kernel();

        //$dataBase = new DatabaseObject('domoapp', '' , 'localhost', 'root');
        $dataBase = $kernel->get("database.object");
        $databaseService = $kernel->get("database.service");
        $sessionService = $kernel->get("session.manager");
        $databaseService->connect($dataBase);

//        $var = $this->get('access.granter')->isGranted("AUTHENTICATED_USER");
//        if($var){
            return $this->get("template.service")->parse("serviceClient/accueilServiceClient.php", array());
//        }else{
//            throw new AccessDeniedException();
//        }
    }
}

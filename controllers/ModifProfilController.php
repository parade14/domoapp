<?php

namespace controllers;

use kernel\Kernel;
use Kernel\ServiceHandler\ServiceInterface;
use Services\HttpFoundation\AccessDeniedException;
use Entities\User;


class ModifProfilController extends BaseController
{
    public static function getName(){
        return "modifProfil.controller";
    }

    /**
     * @return mixed
     * @throws \Exception
     */
    public function index(){
        
        $kernel = $this->kernel;

        $dataBase = $kernel->get("database.object");
        $databaseService = $kernel->get("database.service");
        $sessionService = $kernel->get("session.manager");
        $userService = $kernel->get("user.service");
        $userService->setServiceConnect($databaseService);
        $userService->setDataBaseObject($dataBase);
        $databaseService->connect($dataBase);
        $user = $userService->getUserBy("id", $this->get('session.manager')->getCurrentUser()->getId());
       

        $var = $this->get('access.granter')->isGranted("AUTHENTICATED_USER");
        if($var){
            return $this->get("template.service")->parse("modifierProfil/modificationClient.php", array("user"=>$user));
        }else{
            header('Location: ../');
            throw new AccessDeniedException();
        }
    }
}


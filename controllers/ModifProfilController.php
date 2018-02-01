<?php

namespace controllers;

use Services\HttpFoundation\AccessDeniedException;


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
        $userService = $kernel->get("user.service");
        $userService->setServiceConnect($databaseService);
        $userService->setDataBaseObject($dataBase);
        $databaseService->connect($dataBase);
        $user = $this->get('session.manager')->getCurrentUser();
       

        $var = $this->get('access.granter')->isGranted("AUTHENTICATED_USER");
        if($var){
            return $this->get("template.service")->parse("modifierProfil/modificationClient.php", array("user"=>$user));
        }else{
            header('Location: ../');
            throw new AccessDeniedException();
        }
    }
}


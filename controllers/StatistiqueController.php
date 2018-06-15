<?php

namespace controllers;

use Services\HttpFoundation\AccessDeniedException;


class StatistiqueController extends BaseController
{
    public static function getName(){
        return "statistique.controller";
    }

    /**
     * @return mixed
     * @throws \Exception
     */
    public function index(){
        $kernel = $this->kernel;

        $dataBase = $kernel->get("database.object");
        $databaseService = $kernel->get("database.service");
       
        $var = $this->get('access.granter')->isGranted("AUTHENTICATED_USER");
        if($var){
            return $this->get("template.service")->parse("statistiques/statistiques.php", array("user"=>$this->get('session.manager')->getCurrentUser()));
        }else{
            header('Location: ../');
            throw new AccessDeniedException();
            
        }
    }

}
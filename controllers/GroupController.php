<?php

namespace controllers;

use kernel\Kernel;
use Kernel\ServiceHandler\ServiceInterface;
use Services\HttpFoundation\AccessDeniedException;
use Entities\User;


class GroupController extends BaseController
{
    public static function getName(){
        return "gestionnaire.controller";
    }

    /**
     * @return mixed
     * @throws \Exception
     */
    public function index(){
        
        $kernel = $this->kernel;

        //$dataBase = new DatabaseObject('domoapp', '' , 'localhost', 'root');
        $dataBase = $kernel->get("database.object");
        $databaseService = $kernel->get("database.service");
        $sessionService = $kernel->get("session.manager");
        $databaseService->connect($dataBase);
        
        $groupService = $kernel->get("group.service");

        $groupService->setServiceConnect($databaseService);
        $groupService->setDataBaseObject($dataBase);
        
        $groups = $groupService->getGroupsByAdminId(3);// TODO GET THE CURRENT ID

        
        foreach($groups as $group) {
            $id = $group->getId();
            ${'accommodations_'.$id} = $groupService->getAccommodationsByGroup($group);

        }
        //$var = $this->get('access.granter')->isGranted("AUTHENTICATED_USER");
        //if($var){
            return $this->get("template.service")->parse("gestionnaire/gestionGroupes.php", array("groups" => $groups, "groupService"=>$groupService));
        //}else{
         //   throw new AccessDeniedException();
        //}
    }
}
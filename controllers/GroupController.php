<?php

namespace controllers;

use kernel\Kernel;
use Kernel\ServiceHandler\ServiceInterface;
use Services\HttpFoundation\AccessDeniedException;
use Entities\User;


class GroupController extends BaseController
{
    public static function getName(){
        return "group.controller";
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
        $databaseService->connect($dataBase);
        
        $groupService = $kernel->get("group.service");

        $groupService->setServiceConnect($databaseService);
        $groupService->setDataBaseObject($dataBase);
        
        $groups = $groupService->getGroupsByAdminId($this->get('session.manager')->getCurrentUser()->getId());

        
        foreach($groups as $group) {
            $id = $group->getId();
            ${'accommodations_'.$id} = $groupService->getAccommodationsByGroup($group);

        }
        $var = $this->get('access.granter')->isGranted("AUTHENTICATED_USER");
        if($var && $this->get('session.manager')->getCurrentUser()->getProfileType()==3){
            return $this->get("template.service")->parse("gestionnaire/gestionGroupes.php", array("groups" => $groups, "groupService"=>$groupService));
        } else {
           header('Location: ../');
           throw new AccessDeniedException();
        }
    }
}
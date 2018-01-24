<?php

namespace services\group;

use services\group\GroupService;
use Kernel\ServiceHandler\ServiceInterface;   
    
interface GroupServiceInterface extends ServiceInterface
{

    public function createGroup($group);

    public function deleteGroup($idGroup);

    public function updateGroup($group);

    public function getGroup($idGroup);
    
    public function getGroupsByAdminId($idUser);
    
    public function getAccommodationsByGroup($group);

    
}

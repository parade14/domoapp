<?php
/**
 * Created by PhpStorm.
 * User: Nicolas
 * Date: 15/01/2018
 * Time: 10:27
 */

namespace services\security;

use Entities\User;

class RolesManager implements RolesManagerInterface
{
    protected $roles;

    public function __construct(){
        $this->roles = array(
            "ANONYMOUS_USER"=>array(),
            "AUTHENTICATED_USER"=>array("ANONYMOUS_USER"),
            "GESTIONNAIRE"=>array("AUTHENTICATED_USER"),
            "SERVICE_CLIENT"=>array("GESTIONNAIRE", "AUTHENTICATED_USER"),
        );
    }


    public function compareRoles($role1, $role2)
    {
        // TODO: Implement compareRoles() method.
    }

    public function addRole(User $user, $role){
        if(is_string($role) and array_key_exists($role, $this->roles)) {
            $user->addRoles($this->roles[$role]);
            $user->addRoles($role);
        }
        elseif(is_array($role)) foreach ($role as $roleUnited) $this->addRole($user, $roleUnited);
        elseif(is_string($role) and !array_key_exists($role, $this->roles)) throw new \LogicException("unknow $role");

        return $this;
    }

    public static function getName()
    {
        return "roles.manager";
    }

}
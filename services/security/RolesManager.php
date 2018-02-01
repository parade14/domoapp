<?php
/**
 * Created by PhpStorm.
 * User: Nicolas
 * Date: 15/01/2018
 * Time: 10:27
 */

namespace Services\Security;

use Entities\User;

class RolesManager implements RolesManagerInterface
{
    /**
     * @var array
     */
    protected $roles;

    public function __construct(){
        $this->roles = array(
            "ANONYMOUS_USER"=>array(),
            "AUTHENTICATED_USER"=>array(),
            "GESTIONNAIRE"=>array("AUTHENTICATED_USER"),
            "SERVICE_CLIENT"=>array("GESTIONNAIRE", "AUTHENTICATED_USER"),
        );
    }


    /**
     * @param string $needed
     * @param array|string $role
     * @return bool
     *
     * Return true if $needed <= $role, else false
     */
    public function compareRoles($needed, $role)
    {
        if(is_array($role)){
            $i = 0;
            foreach ($role as $roleUnited){
                $i += (int) $this->compareRoles($needed, $roleUnited);
            }
            return $i>0;
        }

        if(!array_key_exists($needed, $this->roles) or !array_key_exists($role, $this->roles)) throw new \LogicException("unknow role $role or $needed");

        return $needed === $role or in_array($role, $this->roles[$needed]);
    }

    /**
     * @param User $user
     * @param array|string $role
     * @return User
     */
    public function addRole(User $user, $role){
        if(is_string($role) and array_key_exists($role, $this->roles)) {
            $user->addRoles($this->roles[$role]);
            $user->addRoles($role);
        }
        elseif(is_array($role)) foreach ($role as $roleUnited) $this->addRole($user, $roleUnited);
        elseif(is_string($role) and !array_key_exists($role, $this->roles)) throw new \LogicException("unknow role $role");

        return $user;
    }

    /**
     * @return string
     */
    public static function getName()
    {
        return "roles.manager";
    }

}
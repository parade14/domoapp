<?php
/**
 * Created by PhpStorm.
 * User: nicol
 * Date: 21/11/2017
 * Time: 09:51
 */

namespace Services\Security;



use Entities\User;
use Kernel\ServiceHandler\ServiceInterface;

interface RolesManagerInterface extends ServiceInterface
{
    /**
     * @param $role1 string
     * @param $role2 string
     * @return boolean
     */
    public function compareRoles($role1, $role2);

    /**
     * @param $user User
     * @param $role string|array
     * @return mixed
     */
    public function addRole(User $user, $role);
}
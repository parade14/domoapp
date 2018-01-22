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
     * @param $needed string
     * @param $role string|array
     * @return boolean
     */
    public function compareRoles($needed, $role);

    /**
     * @param $user User
     * @param $role string|array
     * @return $this
     */
    public function addRole(User $user, $role);
}
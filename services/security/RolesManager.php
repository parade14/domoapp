<?php
/**
 * Created by PhpStorm.
 * User: Nicolas
 * Date: 15/01/2018
 * Time: 10:27
 */

namespace Services\Security;

class RolesManager implements RolesManagerInterface
{
    public function compareRoles($role1, $role2)
    {
        // TODO: Implement compareRoles() method.
    }

    public static function getName()
    {
        return "roles.manager";
    }

}
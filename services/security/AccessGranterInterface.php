<?php
/**
 * Created by PhpStorm.
 * User: nicol
 * Date: 20/11/2017
 * Time: 09:39
 */

namespace Services\Security;


use Services\HttpFoundation\AccessDeniedException;

interface AccessGranterInterface
{
    /**
     * @param $role string
     * @param $object object
     * @return AccessDeniedException|true
     */
    public function isGranted($role, $object);


}
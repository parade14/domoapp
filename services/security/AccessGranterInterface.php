<?php
/**
 * Created by PhpStorm.
 * User: nicol
 * Date: 20/11/2017
 * Time: 09:39
 */

namespace domoapp\services\security;

use domoapp\services\HttpFoundation\AccessDeniedException;

interface AccessGranterInterface
{
    /**
     * @param $role string
     * @return AccessDeniedException|true
     */
    public function isGranted($role);


}
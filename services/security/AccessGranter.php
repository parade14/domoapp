<?php
/**
 * Created by PhpStorm.
 * User: nicol
 * Date: 21/11/2017
 * Time: 08:59
 */

namespace domoapp\services\security;

use domoapp\services\HttpFoundation\AccessDeniedException;

class AccessGranter implements AccessGranterInterface
{
    public function __construct()
    {

    }


    public function isGranted($role)
    {
        // TODO: Implement isGranted() method.
    }

}
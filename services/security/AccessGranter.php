<?php
/**
 * Created by PhpStorm.
 * User: nicol
 * Date: 21/11/2017
 * Time: 08:59
 */

namespace Services\Security;


use Services\HttpFoundation\AccessDeniedException;
use Services\Session\SessionManagerInterface;

class AccessGranter implements AccessGranterInterface
{

    /**
     * @var SessionManagerInterface
     */
    protected $sessionManager;

    /**
     * @var RolesManagerInterface
     */
    protected $rolesManager;

    public function __construct(SessionManagerInterface $sessionManager, RolesManagerInterface $rolesManager)
    {
        $this->sessionManager = $sessionManager;
        $this->rolesManager = $rolesManager;
    }



    public function isGranted($role, $object = null)
    {
        switch($object){
            case null:
                return ($this->rolesManager->compareRoles($role, $this->sessionManager->getCurrentUser()->getProfileType())) ? true : new AccessDeniedException();
            break;

            //TODO : implements others cases
        }

    }

}
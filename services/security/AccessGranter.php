<?php
/**
 * Created by PhpStorm.
 * User: nicol
 * Date: 21/11/2017
 * Time: 08:59
 */

namespace Services\Security;


use services\database\EntityHasOwnerInterface;
use Services\HttpFoundation\AccessDeniedException;
use Services\Session\SessionManagerInterface;

class AccessGranter implements AccessGranterInterface
{
    /**
     * @return string
     */
    public static function getName(){
        return "access.granter";
    }

    /**
     * @var SessionManagerInterface
     */
    protected $sessionManager;

    /**
     * @var RolesManagerInterface
     */
    protected $rolesManager;

    /**
     * AccessGranter constructor.
     * @param SessionManagerInterface $sessionManager
     * @param RolesManagerInterface $rolesManager
     */
    public function __construct(SessionManagerInterface $sessionManager, RolesManagerInterface $rolesManager)
    {
        $this->sessionManager = $sessionManager;
        $this->rolesManager = $rolesManager;
    }


    /**
     * @param string $role
     * @param null $object
     * @return bool|AccessDeniedException|true
     */
    public function isGranted($role, $object = null)
    {
         return $this->grantedByRole($role) || $this->grantedByOwner($object);
    }

    /**
     * @param $role
     * @return bool
     */
    protected function grantedByRole($role){
        return $this->rolesManager->compareRoles($role, $this->sessionManager->getCurrentUser()->getRoles());
    }

    /**
     * @param $object
     * @return bool
     */
    protected function grantedByOwner($object){

        if(is_object($object)) if($object instanceof EntityHasOwnerInterface) return ($this->sessionManager->getCurrentUser()->getId() === $object->getOwnerId()) ? true : false;

        return false;
    }
}
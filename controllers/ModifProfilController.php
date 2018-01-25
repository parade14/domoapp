<?php

namespace controllers;

use Entities\Accommodation;
use kernel\Kernel;
use Kernel\ServiceHandler\ServiceInterface;
use Services\HttpFoundation\AccessDeniedException;


class ModifProfilController extends BaseController
{
    public static function getName(){
        return "modifProfil.controller";
    }

    /**
     * @return mixed
     * @throws \Exception
     */
    public function index(){


        //$var = $this->get('access.granter')->isGranted("AUTHENTICATED_USER");
        //if($var)
            return $this->get("template.service")->parse("modifierProfil/modificationClient.php", array("user"=>$this->get('session.manager')->getCurrentUser(), ));

        //throw new AccessDeniedException();
    }
}


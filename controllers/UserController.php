<?php
/**
 * Created by PhpStorm.
 * User: Nicolas
 * Date: 19/01/2018
 * Time: 16:03
 */

namespace controllers;

use Services\HttpFoundation\AccessDeniedException;

class UserController extends BaseController
{
    public static function getName(){
        return "user.controller";
    }

    /**
     * @return mixed
     * @throws \Exception
     */
    public function index(){



        $var = $this->get('access.granter')->isGranted("AUTHENTICATED_USER");
        if($var) return $this->get("template.service")->parse("user/index.php", array("user"=>$this->get('session.manager')->getCurrentUser()));

        throw new AccessDeniedException();
    }
}
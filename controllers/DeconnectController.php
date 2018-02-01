<?php
/**
 * Created by PhpStorm.
 * User: Nicolas
 * Date: 19/01/2018
 * Time: 16:03
 */

namespace controllers;

class DeconnectController extends BaseController
{
    public static function getName(){
        return "deconnect.controller";
    }

    /**
     * @throws \Exception
     */
    public function index(){
        $this->get("session.manager")->disconnectCurrentUser();
        $this->redirect('/');
    }
}
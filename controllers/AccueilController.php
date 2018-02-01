<?php
/**
 * Created by PhpStorm.
 * User: Nicolas
 * Date: 19/01/2018
 * Time: 14:01
 */

namespace controllers;



class AccueilController extends BaseController
{


    public static function getName()
    {
        return "accueil.controller";
    }

    /**
     * @param $post
     * @return mixed
     * @throws \Exception
     */
    public function index($post){
        $formRetry = false;
        if(!empty($post['email']) and !empty($post['password'])){
            if($this->indexAction($post['email'], $post['password'])) $this->redirect("user/");
            else $formRetry = true;
        }


        return $this->kernel->get("template.service")->parse("accueil/index.php", array("hello"=>"hello", "formRetry"=>$formRetry));
    }

    /**
     * @param $email
     * @param $password
     * @return boolean
     * @throws \Exception
     */
    public function indexAction($email, $password){
        return $this->get('session.manager')->connectUser($email, $password);
    }
}
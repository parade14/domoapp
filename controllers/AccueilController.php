<?php
/**
 * Created by PhpStorm.
 * User: Nicolas
 * Date: 19/01/2018
 * Time: 14:01
 */

namespace controllers;


use kernel\Kernel;
use Kernel\ServiceHandler\ServiceInterface;
use Services\Session\SessionManager;

class AccueilController implements ServiceInterface
{
    /**
     * @var Kernel
     */
    protected $kernel;

    public function __construct(Kernel $kernel)
    {
        $this->kernel = $kernel;
    }


    public static function getName()
    {
        return "accueil.controller";
    }

    /**
     * @return mixed
     * @throws \Exception
     */
    public function index(){
        return $this->kernel->get("template.service")->parse("accueil/index.php", array("hello"=>"hello"));
    }
}
<?php
/**
 * Created by PhpStorm.
 * User: Nicolas
 * Date: 19/01/2018
 * Time: 17:11
 */

namespace controllers;

use kernel\Kernel;
use Kernel\ServiceHandler\ServiceInterface;

abstract class BaseController implements ServiceInterface
{
    /**
     * @var Kernel
     */
    protected $kernel;

    public function __construct(Kernel $kernel)
    {
        $this->kernel = $kernel;
    }

    /**
     * @param $serviceName
     * @return \Kernel\ServiceHandler\ServiceInterface|mixed
     * @throws \Exception
     */
    public function get($serviceName){
        return $this->kernel->get($serviceName);
    }
}
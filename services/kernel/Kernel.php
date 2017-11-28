<?php
/**
 * Created by PhpStorm.
 * User: nicol
 * Date: 27/11/2017
 * Time: 11:59
 */

namespace services\kernel;


final class Kernel
{
    /**
     * @var ControllerInterface[]
     */
    private $controllers = array();


    /**
     * @param $class array|string|ControllerInterface
     */
    public function addController($class)
    {
        if ($class instanceof ControllerInterface and !in_array(get_class($class), $this->controllers)) {
            $this->controllers[get_class($class)] = $class;

        } elseif ($class instanceof ControllerInterface and in_array(get_class($class), $this->controllers)) {
            throw new \LogicException(sprintf("Class %s already registered in controllers", get_class($class)));
        } elseif (is_array($class)) foreach ($class as $classes) {
            $this->addController($classes);
        } elseif (is_string($class)) {
            $this->addController(new $class());
        }else {
            throw new \LogicException(sprintf("Parameter %s is not a valid type for Kernel::addController", $class));
        }
    }



}
<?php
/**
 * Created by PhpStorm.
 * User: nicol
 * Date: 20/11/2017
 * Time: 09:48
 */

namespace Services\Session;


class SessionManager implements SessionManagerInterface
{

    protected $session;

    public static function getName()
    {
        return "session.manager";
    }


    public function __construct()
    {
        session_start();
        $this->session = $_SESSION;
    }

    public function getSession($name){
        if ($this->hasKey($name)) return $this->session[$name];
        Throw new \LogicException(sprintf("Undefined %s key in session", $name));
    }

    public function add($name, $value)
    {
        if($this->hasKey($name)) Throw new \LogicException(sprintf("Key %s already exists in session", $name));

        else $this->session[$name] = $value;
        return $this;
    }

    public function hasKey($key){
        return array_key_exists($key, $this->session) and !empty($this->session[$key]);
    }

    public function set($name, $value){

        if($this->hasKey($name))  $this->session[$name] = $value;
        else Throw new \LogicException(sprintf("Undefined %s key in session", $name));
        return $this;
    }

    /**
     * @return \Services\User\UserInterface|void
     */
    public function getCurrentUser()
    {
        // TODO: Implement getCurrentUser() method.
    }
}
<?php
/**
 * Created by PhpStorm.
 * User: nicol
 * Date: 20/11/2017
 * Time: 09:48
 */

namespace Services\Session;


use Entities\User;
use services\security\RolesManager;
use Services\user\UserService;
use Services\User\UserServiceInterface;

class SessionManager implements SessionManagerInterface
{

    protected $session;
    protected $rolesManager;
    protected $userService;

    public static function getName()
    {
        return "session.manager";
    }


    public function __construct(RolesManager $rolesManager, UserServiceInterface $userService)
    {
        session_start();
        $this->session =& $_SESSION;
        $this->userService = $userService;
        if(!is_array($this->session)) $this->session = array();

        $this->rolesManager = $rolesManager;

        if(!array_key_exists("current_user", $this->session)){
            $this->session["current_user"] = new User();
            $this->rolesManager->addRole($this->session["current_user"],"ANONYMOUS_USER");

        }

    }

    /**
     * @param string $name
     * @return mixed
     */
    public function getSession($name){
        if ($this->hasKey($name)) return $this->session[$name];
        Throw new \LogicException(sprintf("Undefined %s key in session", $name));
    }

    /**
     * @param string $name
     * @param string $value
     * @return $this|SessionManagerInterface
     */
    public function add($name, $value)
    {
        if($this->hasKey($name)) Throw new \LogicException(sprintf("Key %s already exists in session", $name));

        else $this->session[$name] = $value;
        return $this;
    }

    /**
     * @param $key string
     * @return bool
     */
    public function hasKey($key){
        return array_key_exists($key, $this->session) and !empty($this->session[$key]);
    }

    /**
     * @param $name string
     * @param $value string
     * @return $this
     */
    public function set($name, $value){

        if($this->hasKey($name))  $this->session[$name] = $value;
        else Throw new \LogicException(sprintf("Undefined %s key in session", $name));
        return $this;
    }

    /**
     * @return \Services\User\UserInterface
     */
    public function getCurrentUser()
    {
        return $this->getSession("current_user");
    }

    public function setCurrentUser(User $user){
        $this->set("current_user",$user);
    }

    /**
     * @param $email
     * @param $password
     * @return array|bool|User
     */
    public function checkUser($email, $password){
        try{
            $user = $this->userService->getUserBy('email', $email);
        }
        catch(\Exception $e){
            return false;
        }
        if($user instanceof User){
            return ($user->getPassword === md5($password)) ? $user : false;
        }
        return false;
    }

    /**
     * @param $email
     * @param $password
     * @return bool
     */
    public function connectUser($email, $password){
        if($user = $this->checkUser($email, $password) instanceof User){
            $this->setCurrentUser($user);
            return true;
        }
        return false;
    }
}
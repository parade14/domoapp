<?php
/**
 * Created by PhpStorm.
 * User: nicol
 * Date: 20/11/2017
 * Time: 13:51
 */

namespace Services\Session;

use Kernel\ServiceHandler\ServiceInterface;
use Services\User\UserInterface;

interface SessionManagerInterface extends ServiceInterface
{
    /**
     * @param string $name
     * @return mixed
     */
    public function getSession($name);

    /**
     * @param string $name
     * @param string $value
     * @return SessionManagerInterface
     */
    public function add($name, $value);

    /**
     * @return UserInterface
     */
    public function getCurrentUser();

}
<?php
/**
 * Created by PhpStorm.
 * User: nicol
 * Date: 20/11/2017
 * Time: 13:51
 */

namespace domoapp\Services\Session;


use domoapp\services\handler\ServiceInterface;

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


}
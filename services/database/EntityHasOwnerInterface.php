<?php
/**
 * Created by PhpStorm.
 * User: Nicolas
 * Date: 15/01/2018
 * Time: 11:19
 */

namespace services\database;


interface EntityHasOwnerInterface
{

    /**
     * @return int
     */
    public function getOwnerId();
}
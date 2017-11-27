<?php
/**
 * Created by PhpStorm.
 * User: nicol
 * Date: 20/11/2017
 * Time: 09:22
 */

namespace Services\ServiceHandler;

interface ServiceInterface
{
    /**
     * @return string
     */
    public function getServiceName();
}
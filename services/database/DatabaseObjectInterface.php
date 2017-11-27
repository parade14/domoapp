<?php
/**
 * Author: quentin
 * Date: 17/11/2017
 */

namespace Services\Database;


interface DatabaseObjectInterface
{

    /**
     * @return string
     */
    public function getServerName();

    /**
     * @return string
     */
    public function getUserName();

        /**
     * @return string
     */
    public function getPassword();

    /**
     * @return string
     */
    public function getDatabaseName();

}
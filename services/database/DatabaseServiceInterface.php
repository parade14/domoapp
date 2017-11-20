<?php
/**
 * User: quentin
 * Date: 17/11/2017
 */

namespace domoapp\Services\database;


interface DatabaseServiceInterface
{
    /**
     * try to connect to a database.
     * @param DataBaseObjectInterface $database
     * @return void  
     */
    public function connect($database);

    /**
     * try to connect to a database.
     * @param DataBaseObjectInterface $database
     * @return void  
     */
    public function unconnect($database);
}
<?php
/**
 * User: quentin
 * Date: 17/11/2017
 */

namespace Services\Database;


interface DatabaseServiceInterface
{
    /**
     * try to connect to a database.
     * @param DataBaseObjectInterface $database
     * @return PDO $conn  
     */
    public function connect($database);

    /**
     * unconnect to a database.
     * @param PDO $conn
     * @return void  
     */
    public function unconnect($conn);
}
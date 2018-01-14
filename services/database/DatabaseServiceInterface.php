<?php
/**
 * User: quentin
 * Date: 17/11/2017
 */

namespace Services\Database;


use Kernel\ServiceHandler\ServiceInterface;
use PDO;

interface DatabaseServiceInterface extends ServiceInterface
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
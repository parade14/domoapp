<?php
/**
 * User: quentin
 * Date: 27/11/2017
 */

namespace Services\Database;

use PDO;
use PDOException;

use Services\Database\DatabaseServiceInterface;

class DatabaseService implements DatabaseServiceInterface
{
    public static function getName()
    {
        return "database.service";
    }

    /**
     * try to connect to a database.
     * @param DataBaseObjectInterface $database
     * @return PDO $conn  
     */
    public function connect($database) {

    	$conn = null; 
    	$serverName = $database->getServerName();
    	$userName = $database->getUserName();
    	$password = $database->getPassword();
    	$databaseName = $database->getDatabaseName();

    	try {
    		$conn = new PDO("mysql:host=$serverName;dbname=$databaseName", $userName, $password);
    		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    	} catch (PDOException $e) {
    		throw $e;
    	}

    	return $conn;
    }

    /**
     * unconnect to a database.
     * @param PDO $conn
     * @return void  
     */
    public function unconnect($conn){
    	$conn=null;
    }

}
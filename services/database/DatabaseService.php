<?php
/**
 * User: quentin
 * Date: 27/11/2017
 */

namespace Services\database;

use PDO;
use PDOException;

class DatabaseService implements DatabaseServiceInterface
{

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
    		echo $e->getMessage();
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
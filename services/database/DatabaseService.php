<?php
/**
 * User: quentin
 * Date: 27/11/2017
 */

namespace Services\database;


class DatabaseService implements DatabaseServiceInterface
{

    /**
     * try to connect to a database.
     * @param DataBaseObjectInterface $database
     * @return void  
     */
    public function connect($database) {

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
    }

}
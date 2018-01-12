<?php
/**
 * User: quentin
 * Date: 27/11/2017
 */

//namespace Services\Database;

//use PDO;
//use PDOException;
require 'DatabaseObjectInterface.php';

class DatabaseObject implements DatabaseObjectInterface
{
    private $dataBaseName;
    private $password;
    private $serverName;
    private $userName;
    
    public function __construct($dataBaseName, $password , $serverName, $userName) {
        $this->dataBaseName =$dataBaseName;
        $this->password =$password;
        $this->serverName =$serverName;
        $this->userName = $userName;
    }
       
    public function getDatabaseName(): string {
        return $this->dataBaseName;
    }

    public function getPassword(): string {
        return $this->password;
    }

    public function getServerName(): string {
        return $this->serverName;
    }

    public function getUserName(): string {
        return $this->userName;
    }

}
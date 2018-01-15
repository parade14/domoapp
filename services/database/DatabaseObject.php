<?php
/**
 * User: quentin
 * Date: 27/11/2017
 */

namespace Services\Database;

//use PDO;
//use PDOException;

use Services\Database\DatabaseObjectInterface;

class DatabaseObject
{
    public static function getName(){
        return "database.object";
    }

    private $dataBaseName;
    private $password;
    private $serverName;
    private $userName;
    
    public function __construct($dataBaseName ="nascop", $password ="", $serverName ="localhost", $userName ="root") {
        $this->dataBaseName =$dataBaseName;
        $this->password =$password;
        $this->serverName =$serverName;
        $this->userName = $userName;
    }
       
    public function getDatabaseName() {
        return $this->dataBaseName;
    }

    public function getPassword() {
        return $this->password;
    }

    public function getServerName() {
        return $this->serverName;
    }

    public function getUserName() {
        return $this->userName;
    }

}
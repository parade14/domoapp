<?php
/**
 * User: quentin
 * Date: 27/11/2017
 */

namespace Services\Database;

//use PDO;
//use PDOException;



class DatabaseObject implements DatabaseObjectInterface
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
        public function setDatabaseName($dataBaseName) {
        $this->dataBaseName = $dataBaseName;
    }

    public function setPassword($password) {
        $this->password = $password;
    }

    public function setServerName($serverName) {
        $this->serverName = $serverName;
    }

    public function setUserName($userName) {
        $this->userName = $userName;
    }

}
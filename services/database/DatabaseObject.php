<?php
/**
 * User: quentin
 * Date: 27/11/2017
 */

namespace Services\Database;


class DatabaseObject implements DatabaseObjectInterface
{
    public static function getName(){
        return "database.object";
    }

    /**
     * @var string
     */
    private $dataBaseName;
    /**
     * @var string
     */
    private $password;
    /**
     * @var string
     */
    private $serverName;
    /**
     * @var string
     */
    private $userName;

    /**
     * Please edit defaults parameters to connect to your database.
     * DatabaseObject constructor.
     * @param string $dataBaseName
     * @param string $password
     * @param string $serverName
     * @param string $userName
     */
    public function __construct($dataBaseName ="nascop", $password ="", $serverName ="localhost", $userName ="root") {
        $this->dataBaseName =$dataBaseName;
        $this->password =$password;
        $this->serverName =$serverName;
        $this->userName = $userName;
    }

    /**
     * @return string
     */
    public function getDatabaseName() {
        return $this->dataBaseName;
    }

    /**
     * @return string
     */
    public function getPassword() {
        return $this->password;
    }

    /**
     * @return string
     */
    public function getServerName() {
        return $this->serverName;
    }

    /**
     * @return string
     */
    public function getUserName() {
        return $this->userName;
    }

    /**
     * @param $dataBaseName
     */
        public function setDatabaseName($dataBaseName) {
        $this->dataBaseName = $dataBaseName;
    }

    /**
     * @param $password
     */
    public function setPassword($password) {
        $this->password = $password;
    }

    /**
     * @param $serverName
     */
    public function setServerName($serverName) {
        $this->serverName = $serverName;
    }

    /**
     * @param $userName
     */
    public function setUserName($userName) {
        $this->userName = $userName;
    }

}
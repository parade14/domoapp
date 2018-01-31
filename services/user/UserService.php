<?php
/**
 * User: quentin
 * Date: 05/12/2017
 */

namespace Services\user;


use Entities\User;
use Services\database\DatabaseServiceInterface;
use Services\database\DatabaseObjectInterface;


class UserService implements UserServiceInterface
{
    public static function getName(){
        return "user.service";
    }

    /**
     * The database connection
     * @var DatabaseServiceInterface
     */
    protected $serviceConnect;

    /**
     * The database connection
     * @var DatabaseObjectInterface
     */
    protected $databaseObject;


    function getServiceConnect() {
        return $this->serviceConnect;
    }

    function getDatabaseObject() {
        return $this->databaseObject;
    }

    function setServiceConnect($serviceConnect) {
        $this->serviceConnect = $serviceConnect;
    }

    function setDatabaseObject($databaseObject) {
        $this->databaseObject = $databaseObject;
    }



    /**
     * constructor
     * @var $serviceConnect DatabaseServiceInterface
     * @var $databaseObject DatabaseObjectInterface
     */
    public function __construct(DatabaseServiceInterface $serviceConnect, DatabaseObjectInterface $databaseObject) {
        $this->serviceConnect = $serviceConnect;
        $this->databaseObject = $databaseObject;
    }

    /**
     * @inheritdoc
     */
    public function createUser(UserInterface $user){
        try {
            $conn = $this->serviceConnect->connect($this->databaseObject);

            $sql = "INSERT INTO `User` (first_name, last_name, phone, email, password, profile_type) VALUES (:firstName, :lastName,:phone,:email, :password, :profileType)";
            $stmt = $conn->prepare($sql);
            $stmt->execute(array(
                ':firstName'=>$user->getFirstName(),
                ':lastName'=>$user->getLastName(),
                ':email'=>$user->getEmail(),
                ':password'=>$user->getPassword(),
                ':profileType'=>$user->getProfileType(),
                ':phone'=>$user->getPhone(),
            ));
            $last_id = $conn->lastInsertId();
            // on construit l'objet inséré
            $user->setId($last_id);

            return $user;
            
        } catch (\LogicException $e){
            throw $e;
        }

    }

    /**
     * @inheritdoc 
     */
    public function deleteUser($idUser){
        try {
            $conn = $this->serviceConnect->connect($this->databaseObject);

            $sql = "DELETE FROM user WHERE id='$idUser')";
            $stmt = $conn->prepare($sql);
            $stmt->execute();
        } catch (\LogicException $e){
            throw $e;
        }
        return true;
    }

    /**
     * @inheritdoc  
     */
    public function updateUser(UserInterface $user){
        try {
            $conn = $this->serviceConnect->connect($this->databaseObject);
            
            $id =  $user->getId();
            $first_name = $user->getFirstName();
            $last_name = $user->getLastName();
            $phone = $user->getPhone();
            $email = $user->getEmail();
            $password = $user->getPassword();
            $profile_type = $user->getProfileType();
            
            if($password == md5(NULL)){
                $sql = "UPDATE User SET first_name=:first_name, last_name=:last_name, phone=:phone, email=:email, profile_type=:profile_type WHERE id=:id";
                $stmt = $conn->prepare($sql);
            } else {
                $sql = "UPDATE User SET first_name=:first_name, last_name=:last_name, phone=:phone, email=:email, password=:password, profile_type=:profile_type WHERE id=:id";
                $stmt = $conn->prepare($sql);
                $stmt->bindParam(':password', $password, \PDO::PARAM_STR);
            }
            $stmt->bindParam(':id', $id, \PDO::PARAM_INT);
            $stmt->bindParam(':first_name', $first_name, \PDO::PARAM_STR);
            $stmt->bindParam(':last_name', $last_name, \PDO::PARAM_STR);
            $stmt->bindParam(':phone', $phone, \PDO::PARAM_STR);
            $stmt->bindParam(':email', $email, \PDO::PARAM_STR);
            
            $stmt->bindParam(':profile_type', $profile_type, \PDO::PARAM_STR);
            $stmt->execute();
        } catch (\LogicException $e){
            throw $e;
        }
        return $user;
    }
    
    /**
     * @inheritdoc  
     */
    public function getUserBy($field, $value) {
        $conn = $this->serviceConnect->connect($this->databaseObject);
        try {
            if($field != "id" && $field != "last_name" && $field != "email" ){
                throw new \LogicException("invalid field");

            } else {
                $resultats=$conn->prepare("SELECT * FROM `User` WHERE $field = :value");
                $resultats->execute(array(":value"=>$value));
                $resultats->setFetchMode(\PDO::FETCH_ASSOC);
                $datas = $resultats->fetchAll();
                $return = array();
                foreach ($datas as $data) {
                    $user = new User();
                    $user->setId($data['id']);
                    $user->setFirstName($data['first_name']);
                    $user->setLastName($data['last_name']);
                    $user->setPhone($data['phone']);
                    $user->setEmail($data['email']);
                    $user->setPassword($data['password']);
                    $user->setProfileType($data['profile_type']);
                    array_push($return, $user);
                } 
                $resultats->closeCursor();
            }
        } catch (\LogicException $e){
                throw $e;
        }

        return $return;
    }

}


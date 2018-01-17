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

            $sql = "INSERT INTO user(first_name, last_name, phone, email, password, profile_type) "
                    . "VALUES ('$user->getFirstName()', '$user->getLastName()','$user->getPhone()', '$user->getEmail()', '$user->getPassword()', '$user->getProfileType()')";
            $stmt = $conn->prepare($sql);
            $stmt->execute();
            
            if ($conn->query($sql) === TRUE) {
                $last_id = $conn->lastInsertId();
                // on construit l'objet inséré
                $user->setId($last_id);
            }
            
        } catch (\LogicException $e){
            throw $e;
        }
        return $user;
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

            $sql = "UPDATE user SET first_name=:first_name, last_name=:last_name, phone=:phone, email=:email, password=:password, profile_type=:profile_type WHERE id=:id";
            $stmt = $conn->prepare($sql);        
            $stmt->bindParam(':id', $user->getId(), \PDO::PARAM_STR);
            $stmt->bindParam(':first_name', $user->getFirstName(), \PDO::PARAM_STR);
            $stmt->bindParam(':last_name', $user->getLastName(), \PDO::PARAM_STR);
            $stmt->bindParam(':phone', $user->getPhone(), \PDO::PARAM_STR);
            $stmt->bindParam(':email', $user->getEmail(), \PDO::PARAM_STR);
            $stmt->bindParam(':password', $user->getPassword(), \PDO::PARAM_STR);
            $stmt->bindParam(':profile_type', $user->getProfileType(), \PDO::PARAM_STR);
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
                $resultats=$conn->query("SELECT * FROM user WHERE ".$field."='".$value."'");
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
                    $user->setPassword($data['passsword']);
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


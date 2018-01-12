<?php
/**
 * User: quentin
 * Date: 05/12/2017
 */

namespace Services\user;


use Services\database\DatabaseServiceInterface;
use Services\database\DatabaseObjectInterface;

class UserService implements UserServiceInterface
{

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

            $sql = "INSERT INTO room(first_name, last_name, phone, email, password, profile_type) "
                    . "VALUES ('$user->getFirstName()', '$user->getLastName()','$user->getPhone()', '$user->getEmail()', '$user->getPassword()', '$user->getProfileType()')";
            $stmt = $conn->prepare($sql);
            $stmt->execute();
            
            if ($conn->query($sql) === TRUE) {
                $last_id = $conn->insert_id;
                // on construit l'objet inséré
                $user->setId($last_id);
            }
            
        } catch (LogicException $e){
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
        } catch (LogicException $e){
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

            $sql = "UPDATE user SET first_name=:first_name, last_name=:last_name, phone=:phone, email=:email, password=:password, profile_type=:profile_type WHERE id=:id)";
            $stmt = $conn->prepare($sql);        
            $stmt->bindParam(':id', $room->getId(), PDO::PARAM_STR);
            $stmt->bindParam(':first_name', $room->getFirstName(), PDO::PARAM_STR);       
            $stmt->bindParam(':last_name', $room->getLastName(), PDO::PARAM_STR);    
            $stmt->bindParam(':phone', $room->getPhone(), PDO::PARAM_STR);
            $stmt->bindParam(':email', $room->getEmail(), PDO::PARAM_STR);   
            $stmt->bindParam(':password', $room->getPassword(), PDO::PARAM_STR);  
            $stmt->bindParam(':profile_type', $room->getProfileType(), PDO::PARAM_STR);  
            $stmt->execute();
        } catch (LogicException $e){
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
                throw new LogicException("invalid field");

            } else {
                $resultats=$conn->query("SELECT * FROM user WHERE ".$field."='".$value."'");
                $resultats->setFetchMode(PDO::FETCH_ASSOC);
                $datas = $resultats->fetchAll();
                $return = array();
                foreach ($datas as $data) {
                    $user = new UserInterface();
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
        } catch (LogicException $e){
                throw $e;
        }
        return $return;
    }

}


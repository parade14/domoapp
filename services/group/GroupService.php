<?php

namespace services\group;


use Kernel\ServiceHandler\ServiceInterface;
use services\group\GroupServiceInterface;
use Services\Database\DatabaseObjectInterface;
use Services\Database\DatabaseServiceInterface;
use Services\Database\DatabaseService;
use Services\Database\DatabaseObject;
use Entities\Group;
use Entities\Accommodation;


class GroupService {
    
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
    
    public function setServiceConnect($serviceConnect) {
        $this->serviceConnect = $serviceConnect;
    }

    public function setDataBaseObject($databaseObject) {
        $this->databaseObject = $databaseObject;
    }

    /**
     * constructor
     * @var $serviceConnect DatabaseService
     * @var $databaseObject DatabaseObject
     */
    public function __construct(DatabaseService $serviceConnect, DatabaseObject $databaseObject) {
        $this->serviceConnect = $serviceConnect;
        $this->databaseObject = $databaseObject;
    }

    public static function getName()
    {
      return "group.service";
    } 

    public function createGroup($group){
        try {
            
            $name = $group->getName();
            $administrator_id = $group->getGestionnaireId();


            $conn = $this->serviceConnect->connect($this->databaseObject);
            $sql = "INSERT INTO `Group`(name, administrator_id) VALUES (:name, :administrator_id)";
            $stmt = $conn->prepare($sql);
            
            $stmt->execute(array(
            'name'=>$name,
            'administrator_id'=>$administrator_id,
            ));     

            $stmt = $conn->query("SELECT LAST_INSERT_ID()");
            $lastId = $stmt->fetchColumn();
            $group->setId($lastId);
        } catch (\LogicException $e){
            throw $e;
        }
        return $group;
        
    }
    
    

    public function deleteGroup($idGroup){
                
        try {
            $conn = $this->serviceConnect->connect($this->databaseObject);
            $sql = "DELETE FROM Group WHERE id=:id";
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(':id', $idGroup, PDO::PARAM_INT);  
            $stmt->execute();
        } catch (LogicException $e){
            throw $e;
        }
        return true;
        
    }

    public function updateGroup($group){
             try {
            $name = $group->getName();
            $administrator_id = $group->getGestionnaireId();
            $id = $group->getId();


            $conn = $this->serviceConnect->connect($this->databaseObject);
            $sql = "UPDATE Grou^p SET name=:name, administrator_id=:administrator_id WHERE id=:id";
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(':name', $name, PDO::PARAM_STR);       
            $stmt->bindParam(':administrator_id', $administrator_id, PDO::PARAM_INT); 
            $stmt->bindParam(':id', $id, PDO::PARAM_INT); 

            $stmt->execute();
                        
        } catch (LogicException $e){
            throw $e;
        }
        return $group;
        
    }

    public function getGroup($idGroup){
        
    }
    
    public function getGroupsByAdminId($idUser){
         try {
            $conn = $this->serviceConnect->connect($this->databaseObject);

            $resultats=$conn->query("SELECT * FROM `Group` where administrator_id='$idUser'");
            $datas = $resultats->fetchAll();
            $return = array();
            foreach ($datas as $data) {
                $group = new Group();
                $group->setId($data['id']);
                $group->setGestionnaireId($data['administrator_id']);
                $group->setName($data['name']);
                array_push($return, $group);
            } 
            $resultats->closeCursor();
            
        } catch (LogicException $e){
            throw $e;
        }
        return $return;
        
    }
    
    public function getAccommodationsByGroup($group){
          try {
            $conn = $this->serviceConnect->connect($this->databaseObject);
            
            $id = $group->getId();
            $resultats=$conn->query("select accommodation.* from `accommodation`, `groupaccommodation`, `group` "
                    . "where groupAccommodation.group_id=group.id and "
                    . "Accommodation.id = GroupAccommodation.accommodation_id and "
                    . "GroupAccommodation.group_id='$id';");
            
            $datas = $resultats->fetchAll();
            $return = array();
            foreach ($datas as $data) {
                $accommodation = new Accommodation();
                $accommodation->setId($data['id']);
                $accommodation->setStreet($data['street']);
                $accommodation->setStreetNumber($data['street_number']);
                $accommodation->setArea($data['area']);
                $accommodation->setPostalCode($data['postal_code']);
                $accommodation->setInhabitantNumber($data['inhabitant_number']);
                $accommodation->setCity($data['city']);
                $accommodation->setOwnerId($data['user_id']);
                array_push($return, $accommodation);
            } 
            $resultats->closeCursor();
            
        } catch (LogicException $e){
            throw $e;
        }
        return $return;        
    }
    
    public function createGroupAccommodation($idGroup, $idAccommodation){
        try {
            $conn = $this->serviceConnect->connect($this->databaseObject);
            $sql = "INSERT INTO `GroupAccommodation`(group_id, accommodation_id) VALUES (:idGroup, :idAccommodation)";
            $stmt = $conn->prepare($sql);
            
            $stmt->execute(array(
            'idGroup'=>$idGroup,
            'idAccommodation'=>$idAccommodation,
            ));            
        } catch (\LogicException $e){
            throw $e;
        }
        
    }
}

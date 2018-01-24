<?php

namespace services\group;


use Kernel\ServiceHandler\ServiceInterface;
use services\group\GroupServiceInterface;
use Services\Database\DatabaseObjectInterface;
use Services\Database\DatabaseServiceInterface;
use Services\Database\DatabaseService;
use Services\Database\DatabaseObject;
use Entities\Group;


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
            $sql = "INSERT INTO Group(name, administrator_id) VALUES (:name, :administrator_id)";
            $stmt = $conn->prepare($sql);
            
            $stmt->execute(array(
            'name'=>$name,
            'administrator_id'=>$administrator_id,
            ));            
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
}

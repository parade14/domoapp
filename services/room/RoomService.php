<?php
/**
 * User: quentin
 * Date: 05/12/2017
 */

namespace Services\room;


use Services\database\DatabaseServiceInterface;
use Services\database\DatabaseObjectInterface;
use Entities\Room;
use PDO;

class RoomService implements RoomServiceInterface
{
    public static function getName(){
        return "room.service";
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
     * @return DatabaseServiceInterface
     */
    function getServiceConnect() {
        return $this->serviceConnect;
    }

    /**
     * @return DatabaseObjectInterface
     */
    function getDatabaseObject() {
        return $this->databaseObject;
    }

    /**
     * @param $serviceConnect
     */
    function setServiceConnect($serviceConnect) {
        $this->serviceConnect = $serviceConnect;
    }

    /**
     * @param $databaseObject
     */
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
     * @param string $name
     * @param int $area
     * @param string $accommodation_id
     * @return \LogicException|Room
     * @throws \Exception
     */
    public function createRoom($name, $area, $accommodation_id){
        try {
            $conn = $this->serviceConnect->connect($this->databaseObject);
                       

            $sql = "INSERT INTO `Room`(name, area, accommodation_id) VALUES (:name, :area, :accommodation_id)";
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(':area', $area, PDO::PARAM_INT);       
            $stmt->bindParam(':name', $name , PDO::PARAM_STR);    
            $stmt->bindParam(':accommodation_id', $accommodation_id, PDO::PARAM_INT);
            
            $stmt->execute();
            
            $stmt = $conn->query("SELECT LAST_INSERT_ID()");
            $lastId = $stmt->fetchColumn();

            // on construit l'objet inséré
            $roomInserted = new Room();
            $roomInserted->setId($lastId);
            $roomInserted->setName($name);
            $roomInserted->setArea($area);
            $roomInserted->setAccommodationId($accommodation_id);
            
        } catch (\LogicException $e){
            throw $e;
        }
        return $roomInserted;
    }

    /**
     * delete a room 
     * @param string $idRoom the room to delete
     * @return boolean|\LogicException
     */
    public function deleteRoom($idRoom){
        try {
            $conn = $this->serviceConnect->connect($this->databaseObject);
            
            $sql = "DELETE FROM `DataSensor` WHERE sensor_id IN (SELECT id from `Sensor` where room_id=:idRoom)";
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(':idRoom', $idRoom, PDO::PARAM_INT);
            $stmt->execute();
            
            $sql = "DELETE FROM `Sensor` WHERE room_id=:idRoom";
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(':idRoom', $idRoom, PDO::PARAM_INT);
            $stmt->execute();

            $sql = "DELETE FROM `Room` WHERE id=:idRoom";
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(':idRoom', $idRoom, PDO::PARAM_INT);
            $stmt->execute();
        } catch (\LogicException $e){
            throw $e;
        }
        return true;
    }

    /**
     * @param Room $room
     * @return Room|mixed
     */
    public function updateRoom(Room $room){
        try {
            $conn = $this->serviceConnect->connect($this->databaseObject);

            $sql = "UPDATE `Room` SET area=:area, name=:name, accommodation_id=:accommodation_id WHERE id=:id)";
            $stmt = $conn->prepare($sql);                                  
            $stmt->bindParam(':area', $room->getArea(), PDO::PARAM_STR);       
            $stmt->bindParam(':name', $room->getName(), PDO::PARAM_STR);    
            $stmt->bindParam(':accommodation_id', $room->getAccommodationId(), PDO::PARAM_STR);
            $stmt->bindParam(':id', $room->getId(), PDO::PARAM_INT);   
            $stmt->execute();
        } catch (\LogicException $e){
            throw $e;
        }
        return $room;
    }

    /**
     * @param string $field
     * @param string $value
     * @return array
     * @throws \Exception
     */
    public function getRoomBy($field, $value) {
        $conn = $this->serviceConnect->connect($this->databaseObject);
        try {
            if($field != "id" && $field != "name" && $field != "accommodation_id" ){
                throw new \LogicException("invalid field");

            } else {
                $resultats=$conn->query("SELECT * FROM `Room` WHERE ".$field."='".$value."'");
                $resultats->setFetchMode(PDO::FETCH_ASSOC);
                $datas = $resultats->fetchAll();
                $return = array();
                foreach ($datas as $data) {
                    $room = new Room();
                    $room->setId($data['id']);
                    $room->setAccommodationId($data['accommodation_id']);
                    $room->setName($data['name']);
                    $room->setArea($data['area']);
                    array_push($return, $room);
                } 
                $resultats->closeCursor();
            }
        } catch (\LogicException $e){
                throw $e;
        }
        return $return;
    }

}
<?php
/**
 * User: quentin
 * Date: 27/11/2017
 */

namespace Services\Sensor;

use Services\database\DatabaseServiceInterface;
use Services\database\DatabaseObjectInterface;
use Entities\Sensor;
use PDO;


class SensorService implements SensorServiceInterface
{

    /**
     * @return string
     */
    public static function getName(){
        return "sensor.service";
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
    public function getServiceConnect()
    {
        return $this->serviceConnect;
    }

    /**
     * @param DatabaseServiceInterface $serviceConnect
     * @return SensorService
     */
    public function setServiceConnect(DatabaseServiceInterface $serviceConnect)
    {
        $this->serviceConnect = $serviceConnect;
        return $this;
    }

    /**
     * @return DatabaseObjectInterface
     */
    public function getDatabaseObject()
    {
        return $this->databaseObject;
    }

    /**
     * @param DatabaseObjectInterface $databaseObject
     * @return SensorService
     */
    public function setDatabaseObject(DatabaseObjectInterface $databaseObject)
    {
        $this->databaseObject = $databaseObject;
        return $this;
    }



        /**
     * constructor
     * @var $serviceConnect DatabaseServiceInterface
     * @var $databaseObject DatabaseObjectInterface*
    */
    public function __construct(DatabaseServiceInterface $serviceConnect,DatabaseObjectInterface $databaseObject) {
        $this->serviceConnect = $serviceConnect;
        $this->databaseObject = $databaseObject;
    }


    /**
     * @inheritdoc
     */
    public function createSensor($type, $name, $room_id) {
        
        try {
            $conn = $this->serviceConnect->connect($this->databaseObject);
            $sql = "INSERT INTO `Sensor`(type, name, room_id) VALUES (:type, :name, :room_id)";
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(':type', $type, PDO::PARAM_STR);    
            $stmt->bindParam(':name', $name, PDO::PARAM_STR);    
            $stmt->bindParam(':room_id', $room_id, PDO::PARAM_INT);    
            $stmt->execute();            // on construit l'objet inséré
            $sensorInserted = new Sensor();
            $sensorInserted->setName($name);
            $sensorInserted->setRoomId($room_id);
            $sensorInserted->setType($type);
            
        } catch (\LogicException $e) {
            throw $e;
        }
        return $sensorInserted;
    }

    /**
     * @param string $idSensor
     * @return bool|\LogicException
     */
    public function deleteSensor($idSensor) {
        
        try {

            $conn = $this->serviceConnect->connect($this->databaseObject);
            $sql = "DELETE FROM `Sensor` WHERE id=:idSensor";
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(':idSensor', $idSensor, PDO::PARAM_INT);    
            $stmt->execute();
            $stmt->closeCursor();

            $sql = "DELETE FROM `DataSensor` WHERE id=:idSensor";
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(':idSensor', $idSensor, PDO::PARAM_INT);
            $stmt->execute();
            $stmt->closeCursor();


        } catch (\LogicException $e) {
            throw $e;
        }
        return true;

    }

    /**
     * update a sensor 
     * @param SensorInterface $sensor the sensor to update
     * @return SensorInterface|\LogicException
     */
    public function updateSensor(SensorInterface $sensor){
        
        try {
            $conn = $this->serviceConnect->connect($this->databaseObject);

            $sql = "UPDATE `Sensor` SET type=:type, name=:name, room_id=:room_id WHERE id=:id";

            $stmt = $conn->prepare($sql);                                  
            $stmt->bindParam(':type', $sensor->getType(), \PDO::PARAM_STR);
            $stmt->bindParam(':name', $sensor->getName(), \PDO::PARAM_STR);
            $stmt->bindParam(':room_id', $sensor->getRoomId(), PDO::PARAM_STR);
            $stmt->bindParam(':id', $sensor->getId(), \PDO::PARAM_INT);
            $stmt->execute();
        } catch (\LogicException $e) {
            throw $e;
        }
        return $sensor;

    }

    /**
     * @param string $field
     * @param string $value
     * @return array
     */
    public function getSensorBy($field, $value){
                $conn = $this->serviceConnect->connect($this->databaseObject);
        try {
            if($field != "id" && $field != "type" && $field != "room_id" ){
                throw new \LogicException("invalid field");
            } else {
                $resultats=$conn->prepare("SELECT * FROM `Sensor` WHERE $field = :value");
                $resultats->execute(array(":value"=>$value));
                $resultats->setFetchMode(PDO::FETCH_ASSOC);
                $datas = $resultats->fetchAll();
                $return = array();
                foreach ($datas as $data) {
                    $room = new Sensor();
                    $room->setId($data['id']);
                    $room->setRoomId($data['room_id']);
                    $room->setName($data['name']);
                    $room->setType($data['type']);
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
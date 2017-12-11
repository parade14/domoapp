<?php
/**
 * User: quentin
 * Date: 05/12/2017
 */

namespace Services\room;


use Services\database\DatabaseServiceInterface;
use Services\database\DatabaseObjectInterface;

class RoomService implements RoomServiceInterface
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
    public function __construct($serviceConnect, $databaseObject) {
        $this->serviceConnect = $serviceConnect;
        $this->databaseObject = $databaseObject;
    }

    /**
     * create a room 
     * @param string $name
     * @param int $area
     * @param string $accommodation_id
     * @return RoomInterface|\LogicException
     */
    public function createRoom($name, $area, $accommodation_id){

        $conn = $this->serviceConnect->connect($this->databaseObject);

        $sql = "INSERT INTO room(name, area, accommodation_id) VALUES ('".$name."', '".$area."','".$accommodation_id."')";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
    }

    /**
     * delete a room 
     * @param string $idRoom the room to delete
     * @return boolean|\LogicException
     */
    public function deleteRoom($idRoom){
         $conn = $this->serviceConnect->connect($this->databaseObject);

        $sql = "DELETE FROM room WHERE id='".$idRoom."')";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
    }

    /**
     * update a room 
     * @param RoomInterface $room the room to update
     * @return RoomInterface|\LogicException
     */
    public function updateRoom(RoomInterface $room){
        $conn = $this->serviceConnect->connect($this->databaseObject);

        $sql = "UPDATE room SET area=:area, name=:name, accommodation_id=:accommodation_id WHERE id=:id)";

        $stmt = $pdo->prepare($sql);                                  
        $stmt->bindParam(':area', $room->getArea(), PDO::PARAM_STR);       
        $stmt->bindParam(':name', $room->getName(), PDO::PARAM_STR);    
        $stmt->bindParam(':accommodation_id', $room->getAccommodationId(), PDO::PARAM_STR);
        $stmt->bindParam(':id', $sensor->getId(), PDO::PARAM_INT);   
        $stmt->execute();
    }
    
    /**
     * Search room(s) by the field in parameter
     * @param string $field id_room|name|accomodation_id
     * @param string $value
     * @return array of RoomInterface|\LogicException
     */
    public function getRoomBy($field, $value) {

        $conn = $this->serviceConnect->connect($this->databaseObject);

        if($field != "id_room" && $field != "name" && $field != "accomodation_id" ){
            throw new LogicException("invalid field");
        } else {

            $resultats=$connexion->query("SELECT * FROM ROOM WHERE ".$field."='".$value."'");

            $resultats->setFetchMode(PDO::FETCH_ASSOC);

            $datas = $resultats->fetchAll();

            $return = array();
            foreach ($datas as $data) {

                $room = new RoomInterface();
                $room->setId($data['id']);
                $room->setAccommodationId($data['accommodation_id']);
                $room->setName($data['name']);
                $room->setArea($data['area']);

                array_push($return, $room);
            } 

            $resultats->closeCursor();
            return $return;
        }
    }


}
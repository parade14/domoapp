<?php
/**
 * User: quentin
 * Date: 05/12/2017
 */

namespace Services\room;


use Kernel\ServiceHandler\ServiceInterface;

interface RoomServiceInterface extends ServiceInterface
{

    /**
     * create a sensor 
     * @param string $name
     * @param int $area
     * @param string $accommodation_id
     * @return RoomInterface|\LogicException
     */
    public function createRoom($name, $area, $accommodation_id);

    /**
     * delete a room 
     * @param string $idRoom the room to delete
     * @return boolean|\LogicException
     */
    public function deleteRoom($idRoom);

    /**
     * update a room 
     * @param RoomInterface $room the room to update
     * @return RoomInterface|\LogicException
     */
    public function updateRoom(RoomInterface $room);
    
    /**
     * Search room(s) by the field in parameter
     * @param string $field id_room|name|accomodation_id
     * @param string $value
     * @return array of RoomInterface|\LogicException
     */
    public function getRoomBy($field, $value);


}
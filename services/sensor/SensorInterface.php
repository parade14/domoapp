<?php
/**
 * User: quentin
 * Date: 28/11/2017
 */

namespace Services\Sensor;


interface SensorInterface
{
    /**
     * @return int
     */
    public function getId();

    /**
     * @param int $id
     * @return SensorInterface
     */
    public function setId($id);

    /**
     * @return string
     */
    public function getName();

    /**
     * @param string $name
     * @return SensorInterface
     */
    public function setName($name);

    /**
     * @return string 
     */
    public function getType();

    /**
     * @param string $type
     * @return SensorInterface
     */
    public function setType($type);

    /**
     * @return int
     */
    public function getRoomId();

    /**
     * @param int $roomId
     * @return SensorInterface
     */
    public function setRoomId($roomId);

  

}
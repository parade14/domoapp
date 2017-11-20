<?php
/**
 * User: quentin
 * Date: 20/11/2017
 */

namespace domoapp\Entities;


class Sensor
{

    /**
     * @var integer
     */
    protected $id;

    /**
     * @var string
     */
    protected $type;

    /**
     * @var string
     */
    protected $name;

    /**
     * @var int
     */
    protected $roomId;


    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param int $id
     * @return Sensor
     */
    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $name
     * @return Sensor
     */
    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return string 
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @param string $type
     * @return Sensor
     */
    public function setType($type)
    {
        $this->type = $type;
        return $this;
    }

    /**
     * @return int
     */
    public function getRoomId()
    {
        return $this->roomId;
    }

    /**
     * @param int $roomId
     * @return Sensor
     */
    public function setRoomId($roomId)
    {
        $this->roomId = $roomId;
        return $this;
    }

  

}
<?php
/**
 * User: quentin
 * Date: 20/11/2017
 */

namespace domoapp\Entities;


class DataSensor
{

    /**
     * @var int
     */
    protected $id;

    /**
     * @var int
     */
    protected $sensorId;

    /**
     * @var \DateTime
     */
    protected $date;


    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param int $id
     * @return DataSensor
     */
    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return int
     */
    public function getSensorId()
    {
        return $this->sensorId;
    }

    /**
     * @param int $sensorId
     * @return DataSensor
     */
    public function setSensorId($sensorId)
    {
        $this->sensorId = $sensorId;
        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * @param int $date
     * @return DataSensor
     */
    public function setDate($date)
    {
        $this->date = $date;
        return $this;
    }

  

}
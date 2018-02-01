<?php
/**
 * User: quentin
 * Date: 20/11/2017
 */

namespace Entities;


use Services\DataSensor\DataSensorInterface;

class DataSensor implements DataSensorInterface
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
     * @var double
     */
    protected $value;

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
     * @return double
     */
    public function getValue()
    {
        return $this->value;
    }

    /**
     * @param double $value
     * @return DataSensor
     */
    public function setValue($value)
    {
        $this->value = $value;
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
     * @param \DateTime $date
     * @return DataSensor
     */
    public function setDate(\DateTime $date)
    {
        $this->date = $date;
        return $this;
    }



}
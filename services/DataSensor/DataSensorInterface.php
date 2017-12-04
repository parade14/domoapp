<?php
/**
 * User: quentin
 * Date: 27/11/2017
 */

namespace Services\DataSensor;


interface DataSensorInterface
{
 
    /**
     * @return int
     */
    public function getId();

    /**
     * @param int $id
     * @return DataSensor
     */
    public function setId($id);

    /**
     * @return int
     */
    public function getSensorId();

    /**
     * @param int $sensorId
     * @return DataSensor
     */
    public function setSensorId($sensorId);

    /**
     * @return \DateTime
     */
    public function getDate();

    /**
     * @param \DateTime $date
     * @return DataSensor
     */
    public function setDate(\DateTime $date);

    /**
     * @return double
     */
    public function getValue();

    /**
     * @param double $value
     * @return DataSensor
     */
    public function setValue($value);

}
<?php
/**
 * User: quentin
 * Date: 27/11/2017
 */

namespace Services\DataSensor;


use Services\ServiceHandler\ServiceInterface;

interface DataSensorServiceInterface extends ServiceInterface
{
    /**
     * get the most recent value of a sensor
     * @param string $sensorId
     * @return DataSensorInterface|\LogicException
     */
    public function getLastValue($sensorId);

    /**
     * get the values of a sensor between start date et end date.
     * @param string $sensorId
     * @param \DateTime $startDate 
     * @param \DateTime $endDate 
     * @return array of DataSensorInterface||\LogicException
     */
    public function getValuesBetween($startDate, $endDate, $sensorId);





}
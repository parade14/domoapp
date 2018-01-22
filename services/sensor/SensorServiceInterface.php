<?php
/**
 * User: quentin
 * Date: 05/11/2017
 */

namespace Services\Sensor;


use Kernel\ServiceHandler\ServiceInterface;

interface SensorServiceInterface extends ServiceInterface
{
    /**
     * create a sensor 
     * @param string $type
     * @param string $name
     * @param int $room_id
     * @return SensorInterface|\LogicException
     */
    public function createSensor($type, $name, $room_id);

    /**
     * delete a sensor 
     * @param string $idSensor the sensor to delete
     * @return boolean|\LogicException
     */
    public function deleteSensor($idSensor);

    /**
     * update a sensor 
     * @param SensorInterface $sensor the sensor to update
     * @return SensorInterface|\LogicException
     */
    public function updateSensor(SensorInterface $sensor);
    
    /**
     * Search sensor(s) by the field in parameter
     * @param string $field id_room|id|type
     * @param string $value
     * @return array of SensorInterface|\LogicException
     */
    public function getSensorBy($field, $value);

}
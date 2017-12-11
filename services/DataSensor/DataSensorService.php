<?php
/**
 * User: quentin
 * Date: 27/11/2017
 */

namespace Services\DataSensor;

use Services\database\DatabaseServiceInterface;
use Services\database\DatabaseObjectInterface;

class DataSensorService implements DataSensorServiceInterface
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
     * get the most recent value of a sensor
     * @param string $sensorId
     * @return DataSensorInterface|\LogicException
     * @todo:: Corriger les erreurs
     */
    public function getLastValue($sensorId) {

        $conn = $this->serviceConnect->connect($this->databaseObject);

        $resultats=$connexion->query("SELECT * FROM DATASENSOR WHERE sensor_id='".$sensorId."' AND date = (SELECT MAX(date) FROM DATASENSOR WHERE sensor_id='".$sensorId."') ");

        $resultats->setFetchMode(PDO::FETCH_ASSOC);

        $data = $resultats->fetch();

        $dataSensor = new DataSensorInterface();

        $dataSensor->setId($data['id']);
        $dataSensor->setSensorId($data['sensor_id']);
        $dataSensor->setDate($data['date']);
        $dataSensor->setValue($data['value']);


        $resultats->closeCursor();

        return $dataSensor;
    }



    /**
     * get the values of a sensor between start date et end date.
     * @param string $sensorId
     * @param \DateTime $startDate 
     * @param \DateTime $endDate 
     * @return array of DataSensorInterface||\LogicException
     * @todo:: Corriger les erreurs
     */
    public function getValuesBetween($startDate, $endDate, $sensorId) {

        $conn = $this->serviceConnect->connect($this->databaseObject);

        $resultats=$connexion->query("SELECT * FROM DATASENSOR WHERE sensor_id='".$sensorId."' AND '".$startDate."' <= date <= '".$endDate."'");

        $resultats->setFetchMode(PDO::FETCH_ASSOC);

        $datas = $resultats->fetchAll();

        $return = array();

        foreach ($datas as $data) {

            $dataSensor = new DataSensorInterface();
            $dataSensor->setId($data['id']);
            $dataSensor->setSensorId($data['sensor_id']);
            $dataSensor->setDate($data['date']);
            $dataSensor->setValue($data['value']);

            array_push($return, $dataSensor);
        }

        $resultats->closeCursor();

        return $return;

    }

}
<?php
/**
 * User: quentin
 * Date: 27/11/2017
 */

//namespace Services\DataSensor;

//use Services\database\DatabaseServiceInterface;
//use Services\database\DatabaseObjectInterface;
require "/opt/lampp/htdocs/eleves/domoapp/services/DataSensor/DataSensorServiceInterface.php";
require "/opt/lampp/htdocs/eleves/domoapp/services/DataSensor/DataSensorInterface.php";
require "/opt/lampp/htdocs/eleves/domoapp/entities/DataSensor.php";



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
    public function __construct(DatabaseServiceInterface $serviceConnect, DatabaseObjectInterface $databaseObject) {
        $this->serviceConnect = $serviceConnect;
        $this->databaseObject = $databaseObject;
    }




    /**
     * get the most recent value of a sensor
     * @param string $sensorId
     * @return DataSensorInterface|\LogicException
     */
    public function getLastValue($sensorId) {

        try {
            $conn = $this->serviceConnect->connect($this->databaseObject);

            $resultats=$conn->query("SELECT * FROM DataSensor WHERE sensor_id='$sensorId' AND date = (SELECT MAX(date) FROM DataSensor WHERE sensor_id='$sensorId') ");
            $resultats->setFetchMode(PDO::FETCH_ASSOC);
            $data = $resultats->fetch();
            $dataSensor = new DataSensor();
            $dataSensor->setId($data['id']);
            $dataSensor->setSensorId($data['sensor_id']);
            $dataSensor->setDate(new DateTime($data['date']));
            $dataSensor->setValue($data['value']);
            $resultats->closeCursor();
        } catch (LogicException $e){
            throw $e;
        }
        return $dataSensor;
    }



    /**
     * get the values of a sensor between start date et end date.
     * @param string $sensorId
     * @param \DateTime $startDate 
     * @param \DateTime $endDate 
     * @return array of DataSensorInterface||\LogicException
     */
    public function getValuesBetween($sensorId, $startDate, $endDate) {
        
        try {

            $conn = $this->serviceConnect->connect($this->databaseObject);
            $resultats=$conn->query("SELECT * FROM DataSensor WHERE sensor_id='$sensorId' AND '$startDate' <= date <= '$endDate'");
            $resultats->setFetchMode(PDO::FETCH_ASSOC);
            $datas = $resultats->fetchAll();
            $return = array();
            
            foreach ($datas as $data) {
                $dataSensor = new DataSensorInterface();
                $dataSensor->setId($data['id']);
                $dataSensor->setSensorId($data['sensor_id']);
                $dataSensor->setDate(new DateTime($data['date']));
                $dataSensor->setValue($data['value']);
                
                array_push($return, $dataSensor);
            }
            $resultats->closeCursor();
        
        } catch (LogicException $e){
            throw $e;
        }
        return $return;
    }

}
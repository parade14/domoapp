<?php

//require '/opt/lampp/htdocs/eleves/domoapp/utilities/autoload.php';
/*use Services\Database\DatabaseObject;
use Services\DataSensor\DataSensorService;
use Services\Database\DatabaseService;*/
require "/opt/lampp/htdocs/eleves/domoapp/services/database/DatabaseObject.php";
require "/opt/lampp/htdocs/eleves/domoapp/services/database/DatabaseService.php";
require "/opt/lampp/htdocs/eleves/domoapp/services/DataSensor/DataSensorService.php";


$dataBase = new DatabaseObject('domoapp', '' , 'localhost', 'root');

$databaseService = new DatabaseService();

$dataSensorService = new DataSensorService($databaseService, $dataBase);

$databaseService->connect($dataBase);

$lastDataSensor = $dataSensorService->getLastValue(1);

echo 'last value : '. $lastDataSensor->getValue()."\n";
echo 'last value : '. $lastDataSensor->getDate()->format('Y-m-d H:i:s');






<?php

//require '/opt/lampp/htdocs/eleves/domoapp/utilities/autoload.php';
/*use Services\Database\DatabaseObject;
use Services\DataSensor\DataSensorService;
use Services\Database\DatabaseService;*/
/*require "../../../services/database/DatabaseObject.php";
require "../../../services/database/DatabaseService.php";
require "../../../services/accomodation/AccommodationService.php";*/

require('../../../utilities/autoload.php');
//test autoload

$kernel = new \kernel\Kernel();

//$dataBase = new DatabaseObject('domoapp', '' , 'localhost', 'root');
$dataBase = $kernel->get("database.object");
$dataBase->setDatabaseName('domoapp');
$dataBase->setPassword('');
$dataBase->setServerName('localhost');
$dataBase->setUserName('root');

$databaseService = $kernel->get("database.service");

$accommodationService = $kernel->get("accommodation.service");

$accommodationService->setServiceConnect($databaseService);
$accommodationService->setDataBaseObject($dataBase);
        
//new AccommodationService($databaseService, $dataBase);


$databaseService->connect($dataBase);

$accomodations = $accommodationService->getAccommodationByUserId(1); // TODO GET THE CORRECT USER ID








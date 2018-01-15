<?php

//require '/opt/lampp/htdocs/eleves/domoapp/utilities/autoload.php';
/*use Services\Database\DatabaseObject;
use Services\DataSensor\DataSensorService;
use Services\Database\DatabaseService;*/
require "../../../services/database/DatabaseObject.php";
require "../../../services/database/DatabaseService.php";
require "../../../services/accomodation/AccommodationService.php";

$dataBase = new DatabaseObject('domoapp', '' , 'localhost', 'root');

$databaseService = new DatabaseService();

$accommodationService = new AccommodationService($databaseService, $dataBase);
$databaseService->connect($dataBase);

$accomodations = $accommodationService->getAccommodationByUserId(1); // TODO GET THE CORRECT USER ID








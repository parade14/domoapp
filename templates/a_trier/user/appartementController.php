<?php



require('../../../../utilities/autoload.php');

$kernel = new \kernel\Kernel();

//$dataBase = new DatabaseObject('domoapp', '' , 'localhost', 'root');
$dataBase = $kernel->get("database.object");

$databaseService = $kernel->get("database.service");

$accommodationService = $kernel->get("accommodation.service");
$sessionService = $kernel->get("session.manager");

$accommodationService->setServiceConnect($databaseService);
$accommodationService->setDataBaseObject($dataBase);
        
$databaseService->connect($dataBase);

$accomodations = $accommodationService->getAccommodationByUserId(1);

$user= $sessionService->getCurrentUser();










<?php

require('../../../utilities/autoload.php');
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
        
$databaseService->connect($dataBase);

$accomodations = $accommodationService->getAccommodationByUserId(1); // TODO GET THE CORRECT USER ID








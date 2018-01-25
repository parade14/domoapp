<?php
use Entities\Accommodation;

require('../../utilities/autoload.php');
$kernel = new \kernel\Kernel();

$dataBase = $kernel->get("database.object");
$databaseService = $kernel->get("database.service");
$accommodationService = $kernel->get("accommodation.service");

$accommodationService->setServiceConnect($databaseService);
$accommodationService->setDataBaseObject($dataBase);
        
$databaseService->connect($dataBase);

$accommodationService->deleteAccommodation($_GET['id']);
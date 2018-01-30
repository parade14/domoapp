<?php
use Entities\Accommodation;

require('../../utilities/autoload.php');
$kernel = new \kernel\Kernel();

$dataBase = $kernel->get("database.object");
$databaseService = $kernel->get("database.service");
$roomService = $kernel->get("room.service");

$roomService->setServiceConnect($databaseService);
$roomService->setDataBaseObject($dataBase);
        
$databaseService->connect($dataBase);

$roomService->deleteRoom($_GET['id']);

<?php
require('../../utilities/autoload.php');
$kernel = new \kernel\Kernel();

$dataBase = $kernel->get("database.object");
$databaseService = $kernel->get("database.service");
$sensorService = $kernel->get("sensor.service");

$sensorService->setServiceConnect($databaseService);
$sensorService->setDataBaseObject($dataBase);
        
$databaseService->connect($dataBase);

$sensorService->deleteSensor($_GET['id']);

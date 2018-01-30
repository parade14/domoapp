<?php
use Entities\User;
require('../../utilities/autoload.php');

$kernel = new \kernel\Kernel();
$dataBase = $kernel->get("database.object");
$databaseService = $kernel->get("database.service");
$databaseService->connect($dataBase);
$sessionService = $kernel->get("session.manager");
$sensorService = $kernel->get("sensor.service");
$sensorService->setServiceConnect($databaseService);
$sensorService->setDataBaseObject($dataBase);


$typeSensor = $_POST["sensor"];
$idRoom = $_POST["room"];
$name = $_POST["name"];
$idAcc = $_POST["idAcc"];

$sensorService->createSensor($typeSensor, $name, $idRoom);


header('Location: ../../web/capteurs/index.php?idAcc='.$idAcc);
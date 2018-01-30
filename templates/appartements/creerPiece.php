<?php
use Entities\Room;

require('../../utilities/autoload.php');
$kernel = new \kernel\Kernel();

$dataBase = $kernel->get("database.object");
$databaseService = $kernel->get("database.service");
$roomService = $kernel->get("room.service");

$roomService->setServiceConnect($databaseService);
$roomService->setDataBaseObject($dataBase);
        
$databaseService->connect($dataBase);

$superficie = $_POST['superficie'];
$nomPiece = $_POST['nomPiece'];
$idAppartement = $_POST['idAppartement'];


$roomService->createRoom($nomPiece, $superficie, $idAppartement);

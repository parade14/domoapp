<?php
require('../../utilities/autoload.php');
$kernel = new \kernel\Kernel();

$dataBase = $kernel->get("database.object");
$databaseService = $kernel->get("database.service");
$groupService = $kernel->get("group.service");

$groupService->setServiceConnect($databaseService);
$groupService->setDataBaseObject($dataBase);
        
$databaseService->connect($dataBase);

$groupService->deleteGroup($_GET['id']);


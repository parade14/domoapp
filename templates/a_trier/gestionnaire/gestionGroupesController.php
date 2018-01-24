<?php

require('../../../utilities/autoload.php');

$kernel = new \kernel\Kernel();

//$dataBase = new DatabaseObject('domoapp', '' , 'localhost', 'root');
$dataBase = $kernel->get("database.object");

$databaseService = $kernel->get("database.service");

$groupService = $kernel->get("group.service");
$sessionService = $kernel->get("session.manager");

$groupService->setServiceConnect($databaseService);
$groupService->setDataBaseObject($dataBase);
        
$databaseService->connect($dataBase);

$groups = $groupService->getGroupsByAdminId(3); // TODO GET THE CURRENT ID
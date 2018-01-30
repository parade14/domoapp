<?php
require('../../utilities/autoload.php');
use Entities\Group;
$kernel = new \kernel\Kernel();
$sessionService = $kernel->get("session.manager");
$dataBase = $kernel->get("database.object");
$databaseService = $kernel->get("database.service");
$databaseService->connect($dataBase);

$userService = $kernel->get("user.service");
$userService->setServiceConnect($databaseService);
$userService->setDataBaseObject($dataBase);   

$users = $userService->getUserBy('last_name', $_POST['nameUser']);

$tab = array();
foreach ($users as $user){
    array_push($tab, $user->getLastName().",".$user->getFirstName().",".$user->getPhone().",".$user->getEmail());
}

echo json_encode($tab);
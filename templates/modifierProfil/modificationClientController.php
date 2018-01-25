<?php

$kernel = new \kernel\Kernel();

//$dataBase = new DatabaseObject('domoapp', '' , 'localhost', 'root');
$dataBase = $kernel->get("database.object");

$databaseService = $kernel->get("database.service");

$userService = $kernel->get("user.service");
$sessionService = $kernel->get("session.manager");

$userService->setServiceConnect($databaseService);
$userService->setDataBaseObject($dataBase);
        
$databaseService->connect($dataBase);

$user = $userService->getUserBy('id',1);

if(sizeOf($user)==1){
    $first_name = $user[0]->getFirstName();
    $last_name = $user[0]->getLastName();
    $phone = $user[0]->getPhone();
    $email = $user[0]->getEmail();
    $password = $user[0]->getPassword();
           
}
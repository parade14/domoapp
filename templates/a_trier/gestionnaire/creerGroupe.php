<?php

require('../../../utilities/autoload.php');
$kernel = new \kernel\Kernel();
//$dataBase = new DatabaseObject('domoapp', '' , 'localhost', 'root');
$dataBase = $kernel->get("database.object");
$databaseService = $kernel->get("database.service");
$accommodationService = $kernel->get("accommodation.service");
$sessionService = $kernel->get("session.manager");
$accommodationService->setServiceConnect($databaseService);
$accommodationService->setDataBaseObject($dataBase);   
$databaseService->connect($dataBase);
$accommodations = $accommodationService->getAllAccommodations();

$tab = array();
foreach ($accommodations as $acc){
    array_push($tab, 'Appartement '.$acc->getId().' : '.$acc->getStreetNumber().' '.$acc->getStreet().', '.$acc->getPostalCode().', '.$acc->getCity());
}

echo json_encode($tab);
<?php
use Entities\Accommodation;

require('../../../utilities/autoload.php');
$kernel = new \kernel\Kernel();

$dataBase = $kernel->get("database.object");
$databaseService = $kernel->get("database.service");
$accommodationService = $kernel->get("accommodation.service");

$accommodationService->setServiceConnect($databaseService);
$accommodationService->setDataBaseObject($dataBase);
        
$databaseService->connect($dataBase);

$id = $_POST['id'];
$address = $_POST['adresse'];
$streetNumber = $_POST['numero'];
$codePostal = $_POST['codePostal'];
$city = $_POST['ville'];

// TODO Recup correct user_id (session)
$ownerId = '1';

$area = $_POST['superficie'];
$inhabitantNumber = $_POST['nbHabitants'];
    
$accommodation = new Accommodation();
$accommodation->setArea($area);
$accommodation->setInhabitantNumber($inhabitantNumber);
$accommodation->setStreet($address);
$accommodation->setStreetNumber($streetNumber);
$accommodation->setPostalCode($codePostal);
$accommodation->setCity($city);
$accommodation->setId($id);
$accommodation->setOwnerId($ownerId);


$accommodationExist = $accommodationService->getAccommodationById($id);

if(sizeOf($accommodationExist)==0){
    
    $accommodationService->createAccommodation($accommodation);
    
} else {
    $accommodationService->updateAccommodation($accommodation);
}

header('Location: modifierAppartement.php');


?>
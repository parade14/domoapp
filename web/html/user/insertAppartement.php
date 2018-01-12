<?php

require "../../../services/database/DatabaseObject.php";
require "../../../services/database/DatabaseService.php";
require "../../../services/accommodation/AccommodationService.php";

$dataBase = new DatabaseObject('domoapp', '' , 'localhost', 'root');

$databaseService = new DatabaseService();

$accommodationService = new AccommodationService($databaseService, $dataBase);
$databaseService->connect($dataBase);

$id = $_POST['id'];
$address = $_POST['adresse'];
$area = $_POST['superficie'];
$inhabitantNumber = $_POST['nbHabitants'];
    
$accommodation = new Accommodation();
$accommodation->setArea($area);
$accommodation->setInhabitantNumber($inhabitantNumber);
$accommodation->setStreet($address);
$accommodationService->createAccommodation($accommodation);

echo'coucou';


?>
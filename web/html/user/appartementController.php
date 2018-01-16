<?php

require("../../../utilities/autoload.php");
//test autoload

$kernel = new \kernel\Kernel();


$databaseService = $kernel->get("database.service");

$accommodationService = $kernel->get("accommodation.service");
$databaseService->connect($dataBase);

$accomodations = $accommodationService->getAccommodationByUserId(1); // TODO GET THE CORRECT USER ID








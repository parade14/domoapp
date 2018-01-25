<?php

require('../../../utilities/autoload.php');
use Entities\Group;
$kernel = new \kernel\Kernel();
//$dataBase = new DatabaseObject('domoapp', '' , 'localhost', 'root');
$dataBase = $kernel->get("database.object");
$databaseService = $kernel->get("database.service");
$accommodationService = $kernel->get("accommodation.service");
$groupService = $kernel->get("group.service");
$sessionService = $kernel->get("session.manager");
$accommodationService->setServiceConnect($databaseService);
$accommodationService->setDataBaseObject($dataBase);   
$databaseService->connect($dataBase);



// CREATION GROUPE APRES VALIDATION POPUP
if(isset($_POST['nomGroupe'])){
    
    $nomGroupe = $_POST['nomGroupe'];
    $apparts = $_POST['apparts'];
    
    $group = new Group();
    $group->setGestionnaireId(3); // TODO GET THE CORRECT ID
    $group->setName($nomGroupe);
    $groupService->createGroup($group);
    
    foreach ($apparts as $appart) {
        $groupService->createGroupAccommodation($group->getId(), $appart);
    }
    
                
                
                
// CHARGEMENT DE LA LISTE D'APPARTS POOUR POPUP                
} else {

$accommodations = $accommodationService->getAllAccommodations();

$tab = array();
foreach ($accommodations as $acc){
    array_push($tab, 'Appartement '.$acc->getId().' : '.$acc->getStreetNumber().' '.$acc->getStreet().', '.$acc->getPostalCode().', '.$acc->getCity());
}

echo json_encode($tab);
   
}
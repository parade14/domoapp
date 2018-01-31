<?php
require('../../utilities/autoload.php');

$kernel = new \kernel\Kernel();
$dataBase = $kernel->get("database.object");
$databaseService = $kernel->get("database.service");
$userService = $kernel->get("user.service");
$sessionService = $kernel->get("session.manager");
$userService->setServiceConnect($databaseService);
$userService->setDataBaseObject($dataBase);
$databaseService->connect($dataBase);


$last_name = $_POST["last_name"];
$first_name = $_POST["first_name"];
$phone = $_POST["phone"];
$email = $_POST["email"];
$id = $_POST["id"];

$userTab = $userService->getUserBy('id',$id);
if(sizeOf($userTab)>0){
    $user = $userTab[0];
    $user->setFirstName($first_name);
    $user->setLastName($last_name);
    $user->setPhone($phone);
    $user->setEmail($email);
      
    if(isset($_POST['password']) && $_POST['password'] != ""){
        $user->setPassword($_POST['password']);
    } else {
        $user->setPassword(NULL);
    }
    
    echo $user->getPassword();
    echo is_null($user->getPassword());
    $userService->updateUser($user);
}



header('Location: ../../web/modifierProfil/');





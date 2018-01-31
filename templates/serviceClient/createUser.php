<?php
use Entities\User;
require('../../utilities/autoload.php');

$kernel = new \kernel\Kernel();
$dataBase = $kernel->get("database.object");
$databaseService = $kernel->get("database.service");
$userService = $kernel->get("user.service");
$sessionService = $kernel->get("session.manager");
$userService->setServiceConnect($databaseService);
$userService->setDataBaseObject($dataBase);
$databaseService->connect($dataBase);

$last_name = $_POST["lastName"];
$first_name = $_POST["firstName"];
$phone = $_POST["phone"];
$email = $_POST["email"];
$password = $_POST["password"];
$profileType = $_POST["profileType"];

$user = new User();

$user->setFirstName($first_name);
$user->setLastName($last_name);
$user->setPhone($phone);
$user->setEmail($email);
$user->setProfileType($profileType);
$user->setPassword($password);
$userService->createUser($user);


header('Location: ../../web/serviceClient/');


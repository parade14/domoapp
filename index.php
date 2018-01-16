<?php
/**
 * Created by PhpStorm.
 * User: nicol
 * Date: 20/11/2017
 * Time: 14:40
 */

require('utilities/autoload.php');
//test autoload

$kernel = new \kernel\Kernel();
$kernel->get("session.manager");

/**
 * @var Services\Session\SessionManager
 */
$sessionManager = $kernel->get("session.manager");

var_dump($sessionManager->getCurrentUser());

var_dump($_SESSION);

//print_r($kernel->get("session.manager")->getCurrentUser());

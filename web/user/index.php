<?php
/**
 * Created by PhpStorm.
 * User: nicol
 * Date: 20/11/2017
 * Time: 14:40
 */

require('../../utilities/autoload.php');
//test autoload

$kernel = new \kernel\Kernel();

$user = $kernel->get('session.manager')->getCurrentUser();

if($user->getProfileType() == 1){
    echo $controller = $kernel->get("capteurs.controller")->index();
} else if($user->getProfileType() == 2){
    echo $controller = $kernel->get("serviceClient.controller")->index();
} else if($user->getProfileType() == 3){
    echo $controller = $kernel->get("group.controller")->index();
}
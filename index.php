<?php
/**
 * Created by PhpStorm.
 * User: nicol
 * Date: 20/11/2017
 * Time: 14:40
 */

require('utilities/autoload.php');
//test autoload
$user = new \domoapp\Entities\User();
$user->setEmail("machin");
print_r($user);
echo"hello";
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

print_r($kernel->get("access.granter"));
print_r($kernel->get("room.service"));
print_r($kernel->get("user.service"));





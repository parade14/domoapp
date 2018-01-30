<?php
//test autoload
require('../../utilities/autoload.php');
$kernel = new \kernel\Kernel();

echo $controller = $kernel->get("serviceClient.controller")->index();


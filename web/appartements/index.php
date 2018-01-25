<?php
require('../../utilities/autoload.php');
//test autoload

$kernel = new \kernel\Kernel();

echo $controller = $kernel->get("accommodation.controller")->index();


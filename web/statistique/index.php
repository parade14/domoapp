<?php
require('../../utilities/autoload.php');
//test autoload

$kernel = new \kernel\Kernel();

echo $controller = $kernel->get("statistique.controller")->index();
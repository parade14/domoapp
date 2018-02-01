<?php
require('../../utilities/autoload.php');
$kernel = new \kernel\Kernel();

echo $controller = $kernel->get("deconnect.controller")->index();



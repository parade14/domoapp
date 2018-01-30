<?php
require('../../utilities/autoload.php');
$kernel = new \kernel\Kernel();

echo $controller = $kernel->get("gestionnaire.controller")->index();


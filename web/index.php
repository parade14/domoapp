<?php
/**
 * Created by PhpStorm.
 * User: nicol
 * Date: 20/11/2017
 * Time: 14:40
 */

require('../utilities/autoload.php');
//test autoload

$kernel = new \kernel\Kernel();

echo $controller = $kernel->get("base.controller")->index();


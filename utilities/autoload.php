<?php
/**
 * Created by PhpStorm.
 * User: nicol
 * Date: 24/10/2017
 * Time: 10:00
 */

function autoload($className)
{
    $folder = __DIR__.'/../';
    $className = ltrim($className, '\\');
    $fileName  = '';
    $namespace = '';
    if ($lastNsPos = strripos($className, '\\')) {
        $namespace = strtolower(substr($className, 0, $lastNsPos));
        $className = substr($className, $lastNsPos + 1);
        $fileName  = str_replace('\\', DIRECTORY_SEPARATOR, $namespace) . DIRECTORY_SEPARATOR;
    }
    $fileName .= str_replace('_', DIRECTORY_SEPARATOR, $className) . '.php';



    include $folder. $fileName;
}

spl_autoload_register('autoload');
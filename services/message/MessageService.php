<?php
/**
 * Created by PhpStorm.
 * User: nicol
 * Date: 31/01/2018
 * Time: 14:27
 */

namespace services\message;


use Kernel\ServiceHandler\ServiceInterface;

class MessageService implements ServiceInterface
{
    public static function getName()
    {
        return 'message.service';
    }



}
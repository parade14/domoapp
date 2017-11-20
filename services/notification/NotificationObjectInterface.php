<?php
/**
 * Created by PhpStorm.
 * User: nicol
 * Date: 17/11/2017
 * Time: 15:28
 */

namespace damoapp\Services\Notification;
use \DateTime;

interface NotificationObjectInterface
{
    /**
     * @return string
     */
    public function getType();

    /**
     * @return string
     */
    public function getMessage();

    /**
     * @return DateTime
     */
    public function getDateTime();
}